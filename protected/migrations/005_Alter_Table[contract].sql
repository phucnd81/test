/*======================
========= ISSUE : #15307 & #15308
========================*/

ALTER TABLE "public"."contract"
   ADD COLUMN "ticket_id" CHARACTER VARYING(37),
   ADD COLUMN "ticket_status" CHARACTER VARYING(1) DEFAULT 1,
   ADD COLUMN "ticket_date" DATE;

ALTER TABLE "public"."contract"
   ADD COLUMN "product_name" CHARACTER VARYING(50),
   ADD COLUMN "product_item_number" CHARACTER VARYING(10);
   ADD COLUMN "product_price" CHARACTER VARYING(15);
   ADD COLUMN "product_user_flag" CHARACTER VARYING(1) DEFAULT 1;
   ADD COLUMN "product_sale_start_date" DATE;
   ADD COLUMN "product_sale_end_date" DATE;
   ADD COLUMN "product_description" TEXT;
   ADD COLUMN "product_company_name" CHARACTER VARYING(3);