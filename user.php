<?

function asc2bin($in){$out='';for($i=0,$len=strlen($in);$i<$len;$i++)$out.=sprintf("%08b",ord($in{$i}));return $out;}
function bin2asc($in){$out='';for($i=0,$len=strlen($in);$i<$len;$i+=8)$out.=chr(bindec(substr($in,$i,8)));return $out;}
function ComprimeBin($b){$b=s("0000","a",$b);$b=s("1111","b",$b);$b=s("000","c",$b);$b=s("111","d",$b);$b=s("00","e",$b);$b=s("11","f",$b);$b=s("0","g",$b);$b=s("1","h",$b);$b=s("aa","i",$b);$b=s("bb","j",$b);$b=s("cc","k",$b);$b=s("dd","l",$b);$b=s("ee","m",$b);$b=s("ff","n",$b);$b=s("gg","o",$b);$b=s("hh","p",$b);$b=s("gh","p",$b);$b=s("fg","q",$b);$b=s("fc","r",$b);$b=s("fp","s",$b);$b=s("he","t",$b);$b=s("gp","u",$b);$b=s("he","v",$b);$b=s("dp","w",$b);$b=s("ha","x",$b);$b=s("pp","y",$b);$b=s("dg","z",$b);$b=s("ex","0",$b);$b=s("da","1",$b);$b=s("zf","2",$b);$b=s("gf","3",$b);$b=s("pg","4",$b);$b=s("fa","5",$b);$b=s("eh","6",$b);$b=s("fe","7",$b);$b=s("de","8",$b);$b=s("xc","9",$b);$b=s("gw","A",$b);$b=s("4w","B",$b);$b=s("c5","C",$b);$b=s("36","D",$b);$b=s("hg","E",$b);$b=s("92","F",$b);$b=s("f6","G",$b);$b=s("gq","H",$b);$b=s("77","I",$b);$b=s("tx","J",$b);$b=s("20","K",$b);$b=s("8t","L",$b);$b=s("qb","M",$b);$b=s("qs","N",$b);$b=s("qr","O",$b);$b=s("2e","P",$b);$b=s("sa","Q",$b);$b=s("cJ","R",$b);$b=s("pe","S",$b);$b=s("1A","T",$b);$b=s("AB","U",$b);return $b;}
function DescomprimeBin($b){$b=s("U","AB",$b);$b=s("T","1A",$b);$b=s("S","pe",$b);$b=s("R","cJ",$b);$b=s("Q","sa",$b);$b=s("P","2e",$b);$b=s("O","qr",$b);$b=s("N","qs",$b);$b=s("M","qb",$b);$b=s("L","8t",$b);$b=s("K","20",$b);$b=s("J","tx",$b);$b=s("I","77",$b);$b=s("H","gq",$b);$b=s("G","f6",$b);$b=s("F","92",$b);$b=s("E","hg",$b);$b=s("D","36",$b);$b=s("C","c5",$b);$b=s("B","4w",$b);$b=s("A","gw",$b);$b=s("9","xc",$b);$b=s("8","de",$b);$b=s("7","fe",$b);$b=s("6","eh",$b);$b=s("5","fa",$b);$b=s("4","pg",$b);$b=s("3","gf",$b);$b=s("2","zf",$b);$b=s("1","da",$b);$b=s("0","ex",$b);$b=s("z","dg",$b);$b=s("y","pp",$b);$b=s("x","ha",$b);$b=s("w","dp",$b);$b=s("v","he",$b);$b=s("u","gp",$b);$b=s("t","he",$b);$b=s("s","fp",$b);$b=s("r","fc",$b);$b=s("q","fg",$b);$b=s("p","gh",$b);$b=s("p","hh",$b);$b=s("o","gg",$b);$b=s("n","ff",$b);$b=s("m","ee",$b);$b=s("l","dd",$b);$b=s("k","cc",$b);$b=s("j","bb",$b);$b=s("i","aa",$b);$b=s("h","1",$b);$b=s("g","0",$b);$b=s("f","11",$b);$b=s("e","00",$b);$b=s("d","111",$b);$b=s("c","000",$b);$b=s("b","1111",$b);$b=s("a","0000",$b);return $b;}
function Crip($x){return ComprimeBin(asc2bin($x));} 
function Descrip($x){return bin2asc(DescomprimeBin($x));} 
/*    \Conversão de Data para Banco de Dados/    */
function db_DATA($data){$e=explode("-",$data);return $e[2]."/".$e[1]."/".$e[0];}
function db_DATAi($data){$e=explode("/",$data);return $e[2]."-".$e[1]."-".$e[0];}




function CRIPSENHA($x){
    return md5(CRIP("_. " . ${"x"} . "@senai"));
}
if($_GET['crip']) echo Crip($_GET['crip']);
if($_GET['descrip']) echo Descrip($_GET['descrip']);
if($_GET['cripsenha']) echo CRIPSENHA($_GET['cripsenha']);
if($_GET['qweru'] && $_GET['qwers']) echo CRIPCOOKIE($_GET['qweru'] . "_" . CRIPSENHA( $_GET['qwers'] ) . "_" . $IP);

function VerificaLogin($LOGIN, $IP){
	$q = mysql_query("SELECT * FROM `C334866_senai`.`admin` WHERE ativo = '1'");
	if(mysql_num_rows($q) >= 1){
		while($l = mysql_fetch_object($q)){
		  $kkk = $l->usuario . "_" . $l->senha . "_" . $IP;
			$DADOSATUAIS = CRIPCOOKIE($kkk);
			if($LOGIN == $DADOSATUAIS){
				setcookienow("login",$DADOSATUAIS,0,'/');
				setcookienow("Uusuario",$l->usuario,0,'/');
				setcookienow("dir",Crip($l->direito),0,'/');
				return true;
			}
		}
	}
	return false;
}
?>
