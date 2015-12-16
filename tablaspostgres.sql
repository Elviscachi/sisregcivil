-- Table: imagen

-- DROP TABLE imagen;

CREATE TABLE imagen
(
  nombre text COLLATE pg_catalog."es_PE.utf8" NOT NULL,
  rutaim text COLLATE pg_catalog."es_PE.utf8" NOT NULL,
  imagen bytea NOT NULL,
  tipoim text NOT NULL,
  tamima text NOT NULL,
  idimag numeric NOT NULL,
  CONSTRAINT pk_imagen PRIMARY KEY (idimag)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE imagen
  OWNER TO edgar;

  -- Table: registro

-- DROP TABLE registro;

CREATE TABLE registro
(
  iddato numeric NOT NULL,
  nombre text NOT NULL,
  apepat text,
  apemat text,
  lugdat text NOT NULL,
  diadat text,
  mesdat text,
  anodat text,
  nompad text,
  patpad text,
  matpad text,
  nommad text,
  patmad text,
  matmad text,
  conyug text,
  patcon text,
  matcon text,
  idimag numeric NOT NULL,
  CONSTRAINT pk PRIMARY KEY (iddato),
  CONSTRAINT fk_image FOREIGN KEY (idimag)
      REFERENCES imagen (idimag) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);
ALTER TABLE registro
  OWNER TO edgar;
