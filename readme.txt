create a database name walton


if any error try to make this tables mannualy


$create_table_products = "CREATE TABLE products (
 		G_id int NOT NULL AUTO_INCREMENT,
 		P_cat varchar(20) NOT NULL,
 		P_name varchar(100) NOT NULL,
 		P_model varchar(50) NOT NULL,
 		P_sl_no  varchar(50),
 		P_unique_id varchar(20) UNIQUE,
 		P_quantity int NOT NULL,
 		P_buy_price int,
 		P_sell_price int,
 		P_stutus int DEFAULT 0,
 		P_create_date TIMESTAMP,
 		P_emi_status int DEFAULT 0,
 		PRIMARY KEY (G_id)
	)";

 $create_Sale_table = "CREATE TABLE cashSale (
 		
 		memo_no int(20) NOT NULL AUTO_INCREMENT,
 		B_name varchar(100) NOT NULL,
 		B_phone varchar(13) NOT NULL,
 		B_address varchar(200),
 		B_unique_id varchar(20) UNIQUE,
 		BP_cat varchar(20),
 		BP_name varchar(50),
 		BP_model varchar(50),
 		BP_SL varchar(20),
 		B_product_quantity int NOT NULL,
 		BP_buy_price int,
 		BP_sell_price int,
 		Bp_discount int,
 		BP_profit int,
 		BP_due int,
 		BP_Buy_date TIMESTAMP,
 		BP_emi_status int DEFAULT 0,
 		PRIMARY KEY (memo_no)
	)ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1";




 $create_account = "CREATE TABLE accounts (
 		
 		ac_no int(255) NOT NULL AUTO_INCREMENT,
 	    purchase_id int,
 	    c_name varchar(255) NOT NULL,
 	    c_age int(255),
 	    c_phone varchar(255),
 	    p_address varchar(255),
 	    vid_no varchar(255),
 	    g_one_name varchar(255),
 	    g_one_phone int(255),
 	    g_one_vid int(255),
		g_one_pre_address varchar(255),
		g_one_work_place varchar(255),
	    fathers_name varchar(255),
	    mothers_name varchar(255),
		perm_address varchar(255),
		add_type varchar(255),
		livin_time int(255),
		m_status int(255),
		work_place varchar(255),
		work_time int(255),
		family_mem int(255),
		earning_mem int(255),
		g_one_f_name varchar(255),
		g_one_m_name varchar(255),
		g_one_p_address varchar(255),
		g_one_age int(255),
		g_one_m_income int(255),
        g_two_name varchar(255),
 	    g_two_phone int(255),
 	    g_two_vid int(255),
		g_two_pre_address varchar(255),
		g_two_work_place varchar(255),
		g_two_f_name varchar(255),
		g_two_m_name varchar(255),
		g_two_p_address varchar(255),
		g_two_age int(255),
		g_two_m_income int(255),
		ifneeded varchar(255),
        PRIMARY KEY (ac_no)
	)ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1";






$emi_purchase = "CREATE TABLE emi_purchase (
 		
 		e_p_id int(255) NOT NULL AUTO_INCREMENT,
 		a_no int(255),
 		emi_p_name varchar(255),
 		emi_p_model varchar(255),
 		emi_p_sl varchar(255),
 		emi_b_price int(255),
 		emi_sell_price int(255),
 		emi_addvance int(255),
 		emi_due int(255),
 		emi_ins_no int(255),
 		emi_month_ins int(255),
 		product_use_add varchar(255),
 		ins_paid int(255) DEFAULT 0,
 		ins_left int(255) DEFAULT 0,
 		emi_status int DEFAULT 1,
 		emi_profit int(255),
 		payment_day int(255),
 		l_emi_p_date TIMESTAMP,
 		buy_date TIMESTAMP,
 		last_date DATE DEFAULT '00/00/0000',
 		last_paid_ammount int(255) DEFAULT 0,
		PRIMARY KEY (e_p_id)
	)ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1";



