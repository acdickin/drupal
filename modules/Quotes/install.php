<?php
Function quotes_install(){
	switch ($GLOBALS['db_type']){
		case 'mysql':
		case 'mysqli':
				db_query("CREATE TABLE(quotes)
						(qid not null auto_increment,
						quote text,
						author varchar(255),
						PRIMARY KEY(qid)
				)/*!401000 DEFUALT CHARACTER SET utf8*/;");
				db_query("CREATE TABLE(quotes_rating)
						(qid not null REFERENCES quotes(qid),
						ups int,
						downs int,
						PRIMARY KEY(qid)
				)/*!401000 DEFUALT CHARACTER SET utf8*/;");

				break
		case 'pgsql':
				db_query("Create TABLE (quotes)
					(qid not null auto_increment,
						quote text,
						author varchar(255),
						PRIMARY KEY(qid)
				);");

				db_query("CREATE INDEX (quotes)_qId_IN on (quotes) (qid)");
				db_query("CREATE TABLE(quotes_rating)
						(qid not null REFERENCES quotes(qid),
						ups int,
						downs int,
						PRIMARY KEY(qid)
				);");
				db_query("CREATE INDEX (quotes_rating)_qId_IN on (quotes_rating) (qid)");
	}
}

Function quotes_uninstall(){
	switch ($GLOBALS['db_type']){
		case 'mysql':
		case 'mysqli':
				db_query("DROP TABLE(quotes)");
				db_query("DROP TABLE(quotes_rating)");
				break;
		case 'pgsql':
				db_query("DROP TABLE(quotes)");
				db_query("DROP TABLE(quotes_rating)");
				break;
	}
}

?>
