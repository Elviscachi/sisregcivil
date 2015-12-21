<?php include 'header.php'; ?>

	<script type="text/javascript">
		// Check for the various File API support.
		if (window.File && window.FileReader && window.FileList && window.Blob) {
		  // Great success! All the File APIs are supported.
		} else {
		  alert('The File APIs are not fully supported in this browser.');
		}
	</script>

	<script>
	function handleFileSelect(evt) {
	    var files = evt.target.files; // FileList object

	    // files is a FileList of File objects. List some properties.
	    var output = [];
	    for (var i = 0, f; f = files[i]; i++) {
	      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
	                  f.size, ' bytes, last modified: ',
	                  f.lastModifiedDate.toLocaleDateString(), '</li>');
	    }
	    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  	}

  	document.getElementById('files').addEventListener('change', handleFileSelect, false);
	</script>

	<style>
	.example {
	  padding: 10px;
	  border: 1px solid #ccc;
	}
	#drop_zone {
	  border: 2px dashed #bbb;
	  -moz-border-radius: 5px;
	  -webkit-border-radius: 5px;
	  border-radius: 5px;
	  padding: 25px;
	  text-align: center;
	  font: 20pt bold 'Vollkorn';
	  color: #bbb;
	}
	.thumb {
	  height: 75px;
	  border: 1px solid #000;
	  margin: 10px 5px 0 0;
	}
	#progress_bar {
	  margin: 10px 0;
	  padding: 3px;
	  border: 1px solid #000;
	  font-size: 14px;
	  clear: both;
	  opacity: 0;
	  -o-transition: opacity 1s linear;
	  -moz-transition: opacity 1s linear;
	  -webkit-transition: opacity 1s linear;
	}
	#progress_bar.loading {
	  opacity: 1.0;
	}
	#progress_bar .percent {
	  background-color: #99ccff;
	  height: auto;
	  width: 0;
	}
	#byte_content {
	  margin: 5px 0;
	  max-height: 100px;
	  overflow-y: auto;
	  overflow-x: hidden;
	}
	#byte_range {
	  margin-top: 5px;
	}
	</style>



 	<div class="row">
          <div class="col-lg-3 col-md-3 col-sm-4">
            <div class="list-group table-of-contents">
             	<a href="../index.php">Regresar</a>
				<p>Seleccione una imagen</p>
			  	<div class="example">
			    	<input type="file" id="files1" name="files1[]" />
			    	<output id="file_list"></output>
			  	</div>
            </div>
          </div>
        </div>
    </div>



<script>
	var get = function(id) { return document.getElementById(id); }

	var example1 = example1 || {};
	example1.handleFileSelect = function(evt) {
	  var files = evt.target.files;
	  var output = [];
	  for (var i = 0, f; f = files[i]; i++) {
	    output.push('<li><form action="../controller/Guardar.php" method="post" enctype="multipart/form-data"><input type=text name=nombre value=', escape(f.name), '> <input type=text name=tipo value=', f.type || 'n/a', '> <input type=text name=taman value=',
	                f.size, '> bytes, last modified: ',
	                f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
	                '<button name=enviar type=submit>Guardar</button></form></li>');
	  }
	  get('file_list').innerHTML = '<ul>' + output.join('') + '</ul>';
	}


	get('files1').addEventListener('change', example1.handleFileSelect, false);

	var example2 = example2 || {};
	example2.onDragOver = function(evt) {
	  evt.stopPropagation();
	  evt.preventDefault();
	  evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
	}

	example2.onDragFileDrop = function(evt) {
	  evt.stopPropagation();
	  evt.preventDefault();

	  var files = evt.dataTransfer.files;
	  var output = [];
	  for (var i = 0, f; f = files[i]; i++) {
	    output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
	                f.size, ' bytes, last modified: ',
	                f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
	                '</li>');
	  }
	  get('file_list2').innerHTML = '<ul>' + output.join('') + '</ul>';
	}

	// Setup the dnd listeners.
	get('drop_zone').addEventListener('dragover', example2.onDragOver, false);
	get('drop_zone').addEventListener('drop', example2.onDragFileDrop, false);


	var example3 = example3 || {};
	example3.handleFileSelect = function(evt) {
	  var files = evt.target.files; // FileList object.

	  // Loop through the FileList and render image files as thumbnails.
	  for (var i = 0, f; f = files[i]; i++) {

	    // Only process image files.
	    if (!f.type.match('image.*')) {
	      continue;
	    }

	    var reader = new FileReader();

	    // Need a closure to capture the file information.
	    reader.onload = (function(theFile) {
	      return function(e) {
	        // Render thumbnail.
	        var span = document.createElement('span');
	        span.innerHTML = ['<img class="thumb" src="', e.target.result,
	                          '" title="', escape(theFile.name), '"/>'].join('');
	        get('thumbnails').insertBefore(span, null);
	      };
	    })(f);

	    // Read in the image file as a data URL.
	    reader.readAsDataURL(f);
	  }
	}
	get('files3').addEventListener('change', example3.handleFileSelect, false);

	var example4 = example4 || {};
	example4.readBlob = function(opt_startByte, opt_stopByte) {
	  var files = get('file4').files;
	  if (!files.length) {
	    alert('Please select a file!');
	    return;
	  }

	  var file = files[0];
	  var start = parseInt(opt_startByte) || 0;
	  var stop = parseInt(opt_stopByte) || file.size - 1;

	  var reader = new FileReader();

	  reader.onloadend = function(evt) {
	    if (evt.target.readyState == FileReader.DONE) { // DONE == 2
	      get('byte_content').textContent = evt.target.result;
	      get('byte_range').textContent = ['Read bytes: ', start + 1, ' - ', stop + 1,
	                                       ' of ', file.size, ' byte file'].join('');
	    }
	  };
	  //var blob = file.slice(start, (stop - start) + 1);
	  if (file.webkitSlice) {
	    var blob = file.webkitSlice(start, stop + 1);
	  } else if (file.mozSlice) {
	    var blob = file.mozSlice(start, stop + 1);
	  }
	  reader.readAsBinaryString(blob);
	};
	document.querySelector('.readBytesButtons').addEventListener('click', function(evt) {
	  if (evt.target.tagName.toLowerCase() == 'button') {
	    var startByte = evt.target.getAttribute('data-startbyte');
	    var stopByte = evt.target.getAttribute('data-endbyte');
	    example4.readBlob(startByte, stopByte);
	  }
	}, false);

	function Example5(id) {
	  var reader_;
	  var progress_ = document.querySelector('.percent');
	  var self = this;

	  this.abortRead = function() {
	    reader_.abort();
	  };

	  this.errorHandler = function(evt) {
	    switch(evt.target.error.code) {
	      case evt.target.error.NOT_FOUND_ERR:
	        alert('File Not Found!');
	        break;
	      case evt.target.error.NOT_READABLE_ERR:
	        alert('File is not readable');
	        break;
	      case evt.target.error.ABORT_ERR:
	        break; // noop
	      default:
	        alert('An error occurred reading this file.');
	    };
	  };

	  this.updateProgress = function(evt) {
	    // evt is a ProgressEvent.
	    if (evt.lengthComputable) {
	      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
	      // Increase the progress bar length.
	      if (percentLoaded < 100) {
	        progress_.style.width = percentLoaded + '%';
	        progress_.textContent = percentLoaded + '%';
	      }
	    }
	  };

	  this.handleFileSelect = function(evt) {
	    // Reset progress indicator on new file selection.
	    progress_.style.width = '0%';
	    progress_.textContent = '0%';

	    reader_ = new FileReader();
	    reader_.onerror = self.errorHandler;
	    reader_.onprogress = self.updateProgress;
	    reader_.onabort = function(e) {
	      alert('File read cancelled');
	    };
	    reader_.onloadstart = function(e) {
	      get('progress_bar').className = 'loading';
	    };
	    reader_.onload = function(e) {
	      // Ensure that the progress bar displays 100% at the end.
	      progress_.style.width = '100%';
	      progress_.textContent = '100%';
	      setTimeout("get('progress_bar').className='';", 2000);
	    }

	    // Read in the image file as binary string.
	    reader_.readAsBinaryString(evt.target.files[0]);
	  };

	  get(id).addEventListener('change', self.handleFileSelect, false);
	};
	var example5 = new Example5('file5');
</script>


<?php include 'footer.php'; ?>