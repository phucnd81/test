/************ Add: Sequences ***************/

CREATE SEQUENCE admin_id_seq INCREMENT BY 1;

CREATE SEQUENCE contract_id_seq INCREMENT BY 1;



/************ Update: Tables ***************/

/******************** Add Table: "admin" ************************/

/* Build Table Structure */
CREATE TABLE "admin"
(
	id INTEGER DEFAULT nextval('admin_id_seq'::regclass) NOT NULL,
	user_name VARCHAR(25) NOT NULL,
	password VARCHAR(50) NOT NULL
);

/* Add Primary Key */
ALTER TABLE "admin" ADD CONSTRAINT pkadmin
	PRIMARY KEY (id);


/******************** Add Table: "contract" ************************/

/* Build Table Structure */
CREATE TABLE "contract"
(
	id INTEGER DEFAULT nextval('contract_id_seq'::regclass) NOT NULL,
	licence_key VARCHAR(20) NOT NULL,
	first_name1 VARCHAR(20) NULL,
	last_name1 VARCHAR(20) NULL,
	first_kana1 VARCHAR(20) NULL,
	last_kana1 VARCHAR(20) NULL,
	tel1 VARCHAR(20) NULL,
	mobile1 VARCHAR(20) NULL,
	email1 VARCHAR(50) NULL,
	zip_code1 VARCHAR(20) NULL,
	pref1 TEXT NULL,
	address1_1 TEXT NULL,
	address1_2 TEXT NULL,
	address1_3 TEXT NULL,
	address1_4 TEXT NULL,
	remark1 TEXT NULL,
	first_name2 VARCHAR(20) NULL,
	last_name2 VARCHAR(20) NULL,
	first_kana2 VARCHAR(20) NULL,
	last_kana2 VARCHAR(20) NULL,
	tel2 VARCHAR(20) NULL,
	mobile2 VARCHAR(20) NULL,
	email2 VARCHAR(50) NULL,
	zip_code2 VARCHAR(20) NULL,
	pref2 TEXT NULL,
	address2_1 TEXT NULL,
	address2_2 TEXT NULL,
	address2_3 TEXT NULL,
	address2_4 TEXT NULL,
	remark2 TEXT NULL,
	user_type INTEGER DEFAULT 0 NULL,
	openid TEXT NULL,
	record_type CHAR(2) NULL,
	start_date DATE NULL,
	end_date DATE NULL,
	create_date DATE NULL
);

/* Add Primary Key */
ALTER TABLE "contract" ADD CONSTRAINT pkcontract
	PRIMARY KEY (id);

/* Add Comments */
COMMENT ON COLUMN "contract".licence_key IS '契約者＋契約サービス毎に付与するライセンスキー ';

COMMENT ON COLUMN "contract".user_type IS '0 : 家のあんしんパートナー；1 : 家族のあんしんパートナー';

COMMENT ON COLUMN "contract".openid IS 'docomoID認証で取得されたOpenID ';

COMMENT ON COLUMN "contract".record_type IS 'レコード種別 (01：契約開始 02：契約廃止 )';

COMMENT ON COLUMN "contract".start_date IS '契約開始日 ';

COMMENT ON COLUMN "contract".end_date IS '契約廃止日 ';

COMMENT ON COLUMN "contract".create_date IS 'データ作成年月日 ';

-- ----------------------------
-- Uniques structure for table contract
-- ----------------------------
ALTER TABLE "public"."contract" ADD UNIQUE ("licence_key");
