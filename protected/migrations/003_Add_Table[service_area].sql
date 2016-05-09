
CREATE SEQUENCE service_area_seq INCREMENT BY 1;

-- ----------------------------
-- Table structure for service_area
-- ----------------------------
DROP TABLE IF EXISTS "public"."service_area";
CREATE TABLE "public"."service_area" (
"id" int4 DEFAULT nextval('service_area_seq'::regclass) NOT NULL,
"pref1_code" varchar(50) NOT NULL,
"pref2_code" varchar(50) NOT NULL,
"zip_code" varchar(50) NOT NULL,
"pref1" varchar(128) NOT NULL,
"pref2" varchar(128) NOT NULL,
"address" text NOT NULL,
"house_cleaning" char(1) NOT NULL,
"kajidaiko" char(1) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Primary Key structure for table service_area
-- ----------------------------
ALTER TABLE "public"."service_area" ADD PRIMARY KEY ("id");
