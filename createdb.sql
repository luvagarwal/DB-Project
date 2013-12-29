USE APOLLO;

CREATE TABLE HOSPITAL(
	hospital_id INT NOT NULL AUTO_INCREMENT,
	hospital_name CHAR(30) NOT NULL,
	hospital_type CHAR(30),
	address CHAR(50),
	PRIMARY KEY( hospital_id )
);

CREATE TABLE DOCTOR(
	doctor_id INT NOT NULL AUTO_INCREMENT,
	first_name CHAR(20),
	last_name CHAR(20),
	phone_no INT,
	address CHAR(50),
	hospital_id INT NOT NULL,
	sex CHAR(1),
	qualification CHAR(50),
	PRIMARY KEY( doctor_id ),
	FOREIGN KEY (hospital_id) REFERENCES HOSPITAL(hospital_id) 
);

CREATE TABLE CUSTOMER(
	customer_id INT NOT NULL AUTO_INCREMENT,
	first_name CHAR(20),
	last_name CHAR(20),
	address CHAR(50),
	sex CHAR(1),
	phone_no CHAR(12),
	doctor_id INT,
	PRIMARY KEY(customer_id),
	FOREIGN KEY (doctor_id) REFERENCES DOCTOR(doctor_id)
);

CREATE TABLE INDUSTRY(
	industry_id INT NOT NULL AUTO_INCREMENT,
	address CHAR(50),
	industry_name CHAR(30) NOT NULL,
	PRIMARY KEY(industry_id)
);

CREATE TABLE STORE(
	store_id INT NOT NULL AUTO_INCREMENT,
	store_name CHAR(30),
	address CHAR(50),
	established_on DATE,
	contact_no CHAR(12),
	start_time TIME,
	PRIMARY KEY(store_id)
);

CREATE TABLE EMPLOYEE(
	employee_id INT NOT NULL AUTO_INCREMENT,
	user_name CHAR(15) NOT NULL,
	first_name CHAR(15),
	last_name CHAR(15),
	imageType VARCHAR(25) DEFAULT '',
	imageData mediumblob,
	dob DATE,
	sex CHAR(1),
	date_of_joining DATE,
	address CHAR(50),
	salary INT,
	employee_type CHAR(1),
	phone_no CHAR(12),
	qualification CHAR(50),
	password CHAR(32),
	store_id INT,
	PRIMARY KEY(employee_id),
	FOREIGN KEY (store_id) REFERENCES STORE(store_id)
);

CREATE TABLE PRODUCT(
	product_name CHAR(30) NOT NULL,
	store_id INT,
	no_of_items INT DEFAULT 0,
	manufacture_date DATE,
	expire_date DATE,
	procurrent_cost INT,
	imageType VARCHAR(25) DEFAULT '',
	imageData mediumblob,
	PRIMARY KEY(product_name),
	FOREIGN KEY (store_id) REFERENCES STORE(store_id)
);

CREATE TABLE PURCHASE(
	purchase_id INT NOT NULL,
	customer_id INT NOT NULL,
	date_of_purchase DATE NOT NULL,
	payment_method CHAR(20),
	product_name CHAR(30) NOT NULL,
	total_items INT,
	total_price INT,
	discount INT,
	store_id INT,
	FOREIGN KEY (store_id) REFERENCES STORE(store_id),
	FOREIGN KEY (customer_id) REFERENCES CUSTOMER(customer_id),
	FOREIGN KEY (product_name) REFERENCES PRODUCT(product_name)
);


CREATE TABLE DELIVERY(
	industry_id INT NOT NULL,
	product_name CHAR(30) NOT NULL,
	total_items INT,
	time_of_delivery TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	total_paid INT,
	store_id INT,
	FOREIGN KEY (store_id) REFERENCES STORE(store_id),
	FOREIGN KEY (industry_id) REFERENCES INDUSTRY(industry_id),
	FOREIGN KEY (product_name) REFERENCES PRODUCT(product_name)
);

CREATE TABLE FEEDBACK(
	feedback_id INT NOT NULL AUTO_INCREMENT,
	customer_name CHAR(40),
	time_of_feedback TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	feedback_body CHAR(100),
	PRIMARY KEY(feedback_id)
);

CREATE TABLE REFUND(
	refund_id INT NOT NULL AUTO_INCREMENT,
	customer_id INT,
	purchase_id INT,
	refund_price INT,
	PRIMARY KEY (refund_id)
);

INSERT INTO STORE VALUES (1,'Apollo Gachibowli','New Mumbai Rd, Vinayak Nagar, Gachibowli
Hyderabad, Telangana','2013-12-12','121212121','12');
INSERT INTO STORE VALUES (2,'Apollo Jaipur','A-73, nirman-nagar
Jaipur, Rajasthan','2013-12-12','121212121','12');
INSERT INTO STORE VALUES (3,'Apollo Ahemdabad','613-614, New Nikita, Memnagar, Ahmedabad','2013-12-12','121212121','12');
INSERT INTO STORE VALUES (4,'Apollo Secundrabad','121-12-1 ,Secundrabad,Hyderabad,Telangana','2013-12-12','121212121','12');
INSERT INTO HOSPITAL (hospital_name,hospital_type,address) VALUES ('KALYAN Hospital','neurological','E-12l jaipur');
INSERT INTO HOSPITAL (hospital_name,hospital_type,address) VALUES ('Darna Hospital','neurosurgical','121-2 Ahmedabad');
INSERT INTO HOSPITAL (hospital_name,hospital_type,address) VALUES ('APOLLO DENTAL HOSPITAL','Dental','E-12l Jaipur');
#INSERT INTO DOCTOR (first_name, last_name,phone_no,address,hospital_id,sex,qualification) VALUES ('Aman','Pandey','12121212','W-121 djkjkjdksjdksdjsk,',1,'M','MBBS,MD');
#INSERT INTO CUSTOMER (first_name,last_name,address,sex,phone_no,doctor_id) VALUES ('Dhrumil','Patel','A-73 dmkajda ksjdak akjsdka k','M','94038020192','1');
INSERT INTO `EMPLOYEE` VALUES (1,'Fnatic','slk','kflq','image/jpeg','ÿØÿà\0JFIF\0\0\0\0\0\0ÿÛ\0„\0	( \Z%!1!%)+...383,7(-.+\n\n\n\r\Z.$ $.,,,,-,,-,,,,-.,,-,,,,,,.,,,,,,,,,,,,,,,,,+,,,,,,7ÿÀ\0\0à\0à\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0J\0	\0\0\0\0!1QARaq‘\"b¡±Á#2Br’¢²Ñ%CTd‚“ðñSctƒÂÃáâ$3DÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\06\0\0\0\0\0\0!1AQa\"2q‘ÑR¡±Á#Bðáñ$34ÿÚ\0\0\0?\0œP\0€@ \0€@ \0€@ \0€@ ;Ç))[šªhâ¸ç\ZHìÊÓ•›j…ƒ&•Äg˜:64ôee¯\'O»zƒm§ŠCÏˆª›V9¼Ñ·ºöÞÞ  ”0¯a2Æ|·µ¬&Ç±Í¸!J=¦`§ÿ\0×ïÌ>ˆí¤à¿Öã=ÙÑ?ÚÞ	l™ÖöYn¹<3:Àx”W(¶ÃŠM+}YÍ¦nm#Œ6So}î\Zø\0ƒÛr;l‘?ìñ&ˆœ,Q%Žã»Ø{uÈ%,?‚vÁ#$aüQ¸8wi¸ Ù@ \0€@ 9ÀI\0rN€¼’ƒÁrŸku5Û	5R\r2Â@`>ô§@;®{EøþÕ±J‹ˆÜÚfÃÞ·lŽ×ÊÈ<CÃžòç÷¸ÝÏy.s8ê|TLÄFòµ)kÚ+XÞeŸÕ=žÕ¯÷¶ÞÞNjiæûïxë·§“JZ;¸Ûh[™ˆé6*Ö÷ˆµ¶7A”±ÛwÄ­(ÏwªŽ\r¥µcmþ;Qgo˜VþbÞP¤ðŠß—Ø¾¤Îß4þbäpŠß—Ø:•€nø•YÏvIàÚZÄï¿ÕÏŠ“+œo~nÖfc¬<¦jV—˜­·6Ü”Ä6þac®X›r·sðÜ¸°W4ø÷Ç——ûàv]4s”ò>\'Ç‹Oqèpì7+œ“93¶yØZÊø„­ÝÏCfH;KŽð#Å¹€rŠŽ±™éel–sA³Ûù˜u:¨\0€@ –ª¦ÃéÌµSqM¶yÕhùÁxåw.+±3²C{¶š2C-Ñœÿ\0H{NH£\'@«kEcyfÁ‚ùòF:wËz8€\Z-Þm=^ÛI¡Ç¦¦ÕŽ¾3ã\'*6Ì–\0w-œy¶égŸâžg&ÿ\0û}˜Z\\ßàV[b­ú¹\Z}~£I<ž^þôelüBÅ:yð—^ŸÄÛÛÇ?)ßìS?\0¦4óã(¿ñvö1ÏÎí‰ÅÎþd®:Ó«•Ÿ]©ÖO\'å‘CmëLÛô«±Ãø?g1“7„y|YJ×w¦7é-Z˜-¨ño^n’ò|W†Fîã÷g¾<¿áª³¸ŒÔ•2E#d…îì>ÌŒqk‡qˆ%ŽFí‰À¶,I£)°lÒÇýë8{ÃÉÉ­{Zææ¸×4ÜwP=\0€@ \0‚¬m#”Æ¿šF›Ã0ÓXÜsm:¼~csÝdv2Î6·zœeG%ùåî8v‚º\\}}éïŸÙ‘QÑÈ…13Ì9´ø³ì¬I¼Ûx|Õû[ù´-Á´–ÿ\0úÉDc‚v·óM86’¿ã¿Ædà&f{ÝX1â©XlŒ»BDí;Â™1×%&–Ž’çO\rbÞ¥¹£w‚Õém¦Ë8íòŸ8cVj‘È%Ý‡ò©ÀºŠSvžœ“¸~&w\rï<M\0€@ <†ÕyAêxUCÚm$ÃÕáÖÇœqÜÜÇÁ^`°È2^Îð·Š\r˜[w7¾þJ™\'jÌ¶ô8{]E)>§WT-\'¿\"€ B$ U @ cš;´.õ|vå—?‰èÿ\0™Á1íGXû|Üç-×…c¿Éö	ˆšz˜fÜÜ€»ònwÂè-†P$‰‰  Ù@ \0‚¾z@c|ít4Í>Í$eÏ\0èf–Ç^ÐÖÔx ŒÛ¸w½ÛÝó:xÔžÍ<Ñkçž‘AÀ1Dä¾Iðˆˆùïöo-gª* DDuî\n.¥‘á¢î ÒM’\"g¹\\—®:ó^vƒbŽµÀ¡7S5˜ïW£JÍ©h˜UÁ\"74+Yg_ˆø­¼6Þ¿‹ã\ZhÃ¨Þ½Öëóñk’Êä˜ï˜Af6WˆsØl$ZÐÓÞ¾ˆ=Š\0€@ 0ÖÕ2(¤‘æÍŽ‘çÝh¹ù §Ø¾\"ú™æ¨“ïTLé\\/{fÜÑØ‡‚\rLÚwªÒ7ƒt0Çû6òZZ™ö¡êxL6Ÿ9ý•Šø–*Š`û\\¸[ªâ/~*õ·+£M\\ûE¦co)Ûêç¶‚.|´‹ƒp¹\'[ê³v–äÝÈ¯Óÿ\098íÇ.ñÖ{ÅPkddyŒl\r.Ð‘˜ž‹¥w˜›m¼š˜¦,ÕÁÏÙÒ#~“1¼Ï«ZJ‡ê÷86Fä{´öÆRzUâ±ß0ÒÉ¨É15Å’mjòÚ|ü¦|[3Ö˜šZ[ •¤¶Ç êoÁR)Ë¼ølÝÍ­Œó«1’/^Ÿ¯ÈØb‘Ì‰À†fnWžíjLÄLÇr˜qgËâ\"ñ^hÚgÇ~óf2º)\\Hhk‹K\ZÑck\rêc–-¦kj2é²Þf+3XŽ6ŽövÂ÷K’GýØî.ËÜþJ»ÄWx†Ô`Í—QÙg¿uwŽ]ãÄÊŠÄ°‹˜¸E­óS[Úk2Ç¨áø)©ÅY‰˜·7|Ï†Î•=3|‚×ßà±ZÓn÷gO¥Åƒ~Î6Ý”ª³µ+ÜA<~…fÁ=eç¿ˆ\";*O¯íÿ\0k]ñÿ\0%m<±o{”FÀñK²¢ucƒ€÷]r>!ÞH&$\0€@ GÛpÆyŒ%ìÏ«‘´íü¦îþ–‘âW{>(Íá¼n@Ö·¤tï§° ÍE-‰MüzV¾zoÕ×áZ‰¬Î?>¿wb7­8ž²—‰f]šQ{Û[Zý6RrÆüÛu#ãiÞï\0©‰Ù[ã¥ýè‰øÁm°àXoMäœT˜ˆå£¯qÊõ#\Z€[[éÄïMÕ¥+HÚ±±°ÂÖæËøœ\\{Îõ3;©‡\rqoËã3?9? ½í¨¿gßÁ~Jósí×»pZ4¸Ý»±5‰˜™Žã”,cŠ‰•f\\ŒRBKZ7o?OªØÓGI—”ã¹¹¯JG†óõ`kNî“¿°-—“éóAìöQ‰s›:­È{Æ£ê‚ËP\0‚ô†ÄsÖÑ@@é=é\\7øF<Êµ£Ù=å\0ÐÔtïþ(®±å÷[ºþîî¬%hYêðËm…\"[Õ“Â²ì5“äapµ´ìº½#švkêóÎ3’#}™Õ[.f!PüöcÃr39½µ=\rYiXÛy‡_©Ë¹1^+ËÓ¿Œù2ÿ\0(´Âdnð5ièw£³žnYgþ¥Kig=;ãÃ×ÈÉ±Vˆšñb\\l[}Ýe1Šy¦²ñzWO\\Õægm¿WE¦àÓ¨îXx˜˜Þ$„¨%†gªKKm–ò>ýÁtqÆÕ‡†Ö^ožÓ>{}\0iÚw«µJÖ ÍEVb–9FøäÓ€:+ ¶˜-P–ž\'s0ø Þ@ \n§´\\KÖ1ªçï”ÀÛõbö?x;ÍŸ‹ñw”\nc’ý\Z“ §rWIÈ™EÕ$õ†—~íõ²Ç–=–î‚Ñâ\'ÅÆŒ-	z¼q³;J£j²È¯ËeLYØæÞÙ…¯½^¶ÚwaÔáíñ[ûnÊ7ñÒ6hÅ@’ºFƒ™Ã(ß éù,³“jÄC—‹‡Å³äËž±;Ìmð6£6S”?.f¦‡zšåÛ½]G	‹Í»;rÅ¶Þ6òžöÃ¨\".s²êàAá¯M¸ªv–ÛfÕ¸vžÙ\'$×¬þÿ\0¹ôq9Œ\rq¾]ìèQ{DÎðÉ¤Å|8£ç}¼}<IUÝ³¹Žr¬Ê“f	\nˆkdkã4ŽˆÓ’,Ù#ÌÓmäkæ<ÂèÒ6¬<Vªüùm,-Wk•Ú	d#c·=‡5„ûPý™ðÐ|,‚@@ \ZØ•X†	¥vè¢|‡£F´›|Szg—9îq»œs8ñqÔŸ2Pda±=èPoò|õ1†‹åx.úb»iÂg†ÖÍJñox4‘ñ\n¶âa—\r¹rVÞ°­\\Ù{j2Vxb}lMvW:Ç¥e®+LoÖÉ¯Óã¿%í´³¶fÙ¦âÎ6iâS–[1ŸÖ-§¤zŸp»MÇ¦bc½|Yi–¼Ôá®kÙfå»‹‰\rh\Zèl{‚¿g>-Iâ8¹biiöˆŽ½?H,•™c/{Klà2Ü¯JE7¢S“[Ùaœ¹i1´í¶ñ»mQ¾Ô©­k]–Îs­{0_EjÒf7hj5ôÃ“³å›[¿hÏ‚pðl¶„8Um]™pj#4LÄLmá1´œåŠY$ØbÌö·¬ë+ã®öˆhkröx­o(K¼«ä/¬`ðscí ûFv‚,æxØx€ºOƒœr¹Í7Ì×¹¶Ô8|P(\'À [ ’¶Šóu“BN’´=£Þ\Z;á—Éü€@ <VØ±g«#|¡°7[Èà\r¼.‚²S¶Èt\'µ‚WØVžGÊEÅú{.	ÙÍwo6º”Å4ÑñJøÉíc‹~‹™xÚv{=¹éóˆ1…Vu—>±£;¬ÉAëF.-Ò¶©î÷ÇÍÅÖV½µ¦1Þ-ç^±?&È›÷eam€Ùµ¸\nÓ5ß¤ø#5]ŒFJ{¶¬ÇN»o×¤\nXgfw0^ïuãv:–šÎÑ)Ó`Õà›äÅïiÞ³ÓÇ¤Ã%>ûfÌcy&ö±&öQl‘Ý¶ðË§á¹y{I¼Òó¾ûué3¾Í¼y639Ò©9M‡Õd¼œ«ÞµŠW-ºMí6Ÿg¤:‡ƒ¬IX{»“Æ´ŸŠ~’ç×ûokìì…º9¹ñYiìÆÞ.N»mFjæšÛ“n“XëómÐÎïe¡’}_&–X²V;÷“¡¡Ô^9qWæ<mo÷âßr×—Z].HÓs•°·ÞºÏ§iÁã7ÛÞr³F\ZÞ\rn¼Â±íC\n}6-Uœ€ÙßÏÄ@°Èí-Þ!–Î;Ð-Ïþ×\"êÌX…3½ü§¸ µ>íiâ@ô\0‚\ZôÄ­O}$’Ißÿ\0-¡Œó2;ô „ƒ7÷ È_~ñ¼t ÆãÁ…Øu+™Fs?Ñš‚µí\"—›Å«\0Ð:@ñýæ‚~7\\üÞü½\rôõyÕ…Ó=¥Z ð®¹Q!Lm;À=:€uS¼©8©núÄü‡0Î«HS¼ù«ØbüôƒÀà¡–\"\"6ƒJ„KÕ%ŽÏ[²ºlõí=Pùò[:hïy®9=)ým¼ú ô†ÂK £©´|Rq-—&R8Ø·w¼‚cøã¢fy@sÄÌÑÍöƒ¸¨(-Ÿ$ë´‘9Ûò€|vÒ%§×¨M®=UþbM~aTÐ;$Œ:u$˜!õp5ßŠK±7ø ¶|žÃÙ\r<mfì  é €vË±Wž0Æ~}†£ßzÞ×Mó—‡Xc‚•Ž\nË¤·R‘tHºnn.†æ’£ufXÞ©,VëÑ#lbÕHz ‚ÝÓG³//ÇgûÕ¯”~é½l8ˆÿ\0nqÁ&Ê	ûhI _+D€— ­­kºIóA’3Õ(àNòY½•Õs˜d÷³\Z/àƒØ ëÒ©ÎÅ)ã:©ïy\'ä<F ;°ü#ÇNÔ»e1M_’MÖÞAwÑŸ‰­\0t z+m-þrom3ÅÁiê#Úz®;á´z¼]ÜˆM‘±B• å)\nR-‘$*%Y4¨”OCZÕ\nÄuJ;oÚN{VîŸÝy7;ê~Igr\Z¸?9Œ°9˜à·mìAM¤‰áÎkƒšâÓìÙààGF·ÑV4÷w×ˆòA:l°šI#&ù^ëx’PJèrÛ£ïŒ¸uibøæ(#áÝd\nB	aX+)×+»îtA7 A›m?ÎQÃ4~Ó–ž¢}§©à}1Lú¼\0Xã”¤–DlTIl¥!	DÊ\rQÞ¯yT¥(ìCïMà¶´ÞãÇq¯þˆøB`[@A]6õ†G%£ÐÏOàuƒÈ¹ðù YtA1ìé8÷LèkÛcïÏîÁ~…è;ÐO	„z£œ:N£¶çTš¶‡ß·Vž?ÊÑÔ{ïYÁcÿ\0ç/\'nR‰\nB @…D’„*%“¶\"ÿ\0´œw|–Ö›Ý—ã‘¶¢\'Ó÷”Æ¶`‚\0ô„?ÎT—þ¥§ø®A T6ÀÛìÌ}ä*\0€A[¶ØÀ1¹­ÓO	ñ³xD\0Aaö)\0\0ñŠ€A]ö«6l^§ÜÈÏ&õ\\üó½åìxEvÓW×w•\nŽ´JJ€@\"Bê@¡B¢U—¾ØÔÖ¬‘½fªÙÓxÃÌñúõÇoìœÖÓÏ/¤3ùôG#‡”‡ø ‹@à‚kØ~ÊSï™A0 ßn±[¿^–?pA\r(,ÎÊ)òañ÷’h€AYùuQŸ®wö‡7ô{?EÍÉ;Þ^ã‡×—MHôýz¸€¨oAn‰ÜªRTP¤\nCÕìÊ£&!¼,³iýépxõwÃ[yOì°ËqåBOÒ6o}·ŠˆÉÿ\0Í¼‚	ßa0Ú•ç‰ú”¢\0€AzBEjú\'u©^ßÓ\'þÈ\"ô\r\r¹‰·šYÈxrÑD8‹ ï UlrlõuOëÔÊÿ\0Õ#ŠåÚw´½æš¼¸«‘ú4Â†ÁÀ©XªRU)\0‰Dn.\n„:Ü‘Ÿ%lß²É†}¸r¸Åy´¶ôÚVb\'] ño¼iè\"H˜Ç¨Ñj+rƒØa‘û#ÉÐÈ,VÆ©òÐ4ñä‚@@ !?HÈ¾ÓÔ°žã7 ‡ÚPe¦içoïË’íµ$? ê d²µÎ;špDÄo;*eÉßÓ½r_A¬t*•Š¤·D‹ U)*”…\"gÃeË<G„ùÙM\'kÃO]Nm=ãÒ%¡ÂäÍg‹Bé<+ieé\0Âp¨½«Yakæ¯\0vjAþê\nÿ\0dqÐ÷ ´;7ƒ%C°|z¤\0‚ôŒˆú¾ûhÚ‰OæŒ~ÁòA÷AššL¯kº®ðè-§&œ\r$6êDîQK’Ž­Û²ÓJoÛÙVÝÒË‚7ÉXõ…Y–÷°uÔ¬P‰\nB¢J¤ˆˆ\"€™­¨èÕFìwŽjÌy¬ß$gÏG	÷ê¾{Üì ˆý\"jmKA^¥òöÚ8Èÿ\0¸> ×##¾È-o\"™j(*ê\0€AmÚ>ž×0ÔFñâK	òqA^,ZM›Us˜tÜòAêPyþ_É—\n®?ÙÜ<ôTËîKkEê)ñV€¹o±ÁYb©HP\n¥!\0€D@i*%YX}˜TgÃâì\0.\'zÃÀê+Ë–ñë?«×+0¡H©o>Þ¬UýN„Ò‚ ;Ðg¥ûñŽ24~ÐAly.ÛRCù²\0€Aåv£MÎ`Õã„%ã½¤t_ |P#®‚Âl6·>\Zw°–ùI(<¦Ô¥-Âj­øƒ[à^Å›Ü—C…×›UHW\\«Ÿ³Ùò€dìu”ì¶Ò[)ŠIl‰Ø–@ @…B	e#mÓžÆç½oTÙtpÏ±Ä©Ëª¼z¤%‘¢¯ÞS8âTÂÄÒX¹ÄÈâmÝ¢ÈØƒgš?¥oï×\0m©¡üA\0€@ ÔÅ¨[=<Ð¿îË£u·ÙÂÚv ƒ¤Ù\r@{ƒâÐt.Ë{x\0ƒ¡E±é.3¸xÜ ’¹!ÉvQFZÓ{ïÒÈ=\r\\J‰“C$O\0¶F–¸qb¢cxÚV¥íKE«;L!ìge³µÎ0›· ,3§¯ƒ³‹Žç¯¿oËýú<ÅW$+cß=Ác<ù·©ÇñO½I¤ýšÁªøÝäTvgŽ9¥õúü“?QÞE;§úÞ—Î~ƒù*~¡ò*;§úÞ“Î~†»˜~äS±¿’ÑÆt“þSô–?T“ª|”vWò_ú¶“ñþ¥RuO‘SÙ_ÉÅô‘þ_”ž0ÉŽæ\"§±»ñ½/œý™ÔÑ»ÉOaf+qÝ<wVgé÷mEÉJÇnÞJ—Ÿ6SüqÏÖ#îéÐìöµä]¶ïV<xËW/ËhÚ•ˆüþÉsüšõ8KI»½gˆˆ¡Ä½í{M­;Ì½2•\\>Trf\nØÃ&\0ÛV’±AVìj;ý›­æ>¨9ðì†fJÇ\\5Àïà‚g ƒ$Liü-Â\0€@ \0®`;ÀòA‰Ô‘ío@ž£Q¾AzŒ=Fù\rvü\rò1›ý›|‚7§Ñ·È ÈÜ:¹ò26–1¹£È È#oäÈ\0€@ \0€@ \0€@ \0€@ \0ƒÿÙ','1995-10-22','M','1995-10-22','ldkfjslfjdsl',1,'a','123123123','fsdfds',md5('123'),1);
