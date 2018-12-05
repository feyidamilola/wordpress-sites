<?php

function contentSeed() {
	if(isset($_SERVER['SERVER_NAME'])) { $host = $_SERVER['SERVER_NAME']; } else { $host = $_SERVER['HOST_NAME']; }
	$result = hash('sha256',str_replace("www.","",$host));
	$letters = "abcdef";
	for($i=0;$i<strlen($letters);$i++) { $result = str_replace(substr($letters,$i,1),'',$result); }
	return $result.$result.$result;
}

function getItem($array) {
	global $x,$contentSeed;
	$index = substr($contentSeed,$x,1);
	$x = $x+1;
	$narr = array_merge($array,$array,$array,$array);
	$array = $narr;

	return $array[$index];
}

$x = 0;
$contentSeed = contentSeed();

// BUILD TITLE
$t0 = array("","Online","On-line","Web","On line","Online","Online","Online","","","","","");
$t1 = array("Help with","Help for","Support for","Support:","Help:","Technical Support:","Technical Support for","Tech Support:","Tech Support for","Help -");
$t2 = array("CT Mortgage Calculator","Calculator","CT Loan Calculator","Loan Calculator","Mortage Calculator","Dynamic Mortgage Calculator","CT Calculator","CT Mortgage Calc","Mortgage Calc","Calculator");

$title = getItem($t0)." ".getItem($t1)." ".getItem($t2);
$h1 = getItem($t0)." ".getItem($t1)." ".getItem($t2);
$description = getItem($t0)." ".getItem($t1)." ".getItem($t2);

$glossary = array("Glossary","Glossary of Terms","Dictionary","Dictionary of Terms","Mortgage Terms","Mortgage Definitions","Definitions of Terms","Glossary and Definitions");
$glossaries = array_merge($glossary,$glossary,$glossary);
$h2 = getItem($glossaries);

// Handle Definitions

$mortgage = array("a legal agreement by which a bank or other creditor lends money at interest in exchange for taking title of the debtor's property, with the condition that the conveyance of title becomes void upon the payment of the debt.","a loan obtained through the conveyance of property as security.","a conveyance of an interest in property as security for the repayment of money borrowed.","an agreement that allows you to borrow money from a bank or similar organization by offering something of value, esp. in order to buy a house or apartment, or the amount of money itself","used either by purchasers of real property to raise funds to buy real estate; or alternatively by existing property owners to raise funds for any purpose, while putting a lien on the property being mortgaged");
$mortgages = array_merge($mortgage,$mortgage,$mortgage);
$defmortgage = getItem($mortgages);

$interestrate = array("the proportion of a loan that is charged as interest to the borrower, typically expressed as an annual percentage of the loan outstanding.","The usual way of calculating interest - as a percentage of the sum borrowed.","The percentage of a loan that is charged as interest by the lender to the borrower, expressed as an APR (annual percentage rate) of the remaining loan","the interest percent that a bank or other financial company charges you when you borrow money, or the interest percent it pays you when you keep money in an account");
$interestrates = array_merge($interestrate,$interestrate,$interestrate);
$definterestrate = getItem($interestrates);

$term = array("the number of years to pay back the loan","the years allowed to pay back a mortgage loan","how many years the borrower has to repay the mortgage","the number of years the lender has offered the borrower to repay the loan");
$terms = array_merge($term,$term,$term);
$defterm = getItem($terms);

$rate = array("","","interest rate graph","graph of interest rates","interest rates by country","country interest rates","interest rates", "interest rates financereference.com","finance reference interest rates","interest rates around the world");
$rates = array_merge($rate,$rate,$rate);
$defrate = getItem($rates);


$arms = array("A mortgage on which the interest rate, after an initial period, can be changed by the lender.","a mortgage loan with the interest rate on the note periodically adjusted based on an index which reflects the cost to the lender of borrowing on the credit markets","An adjustable-rate mortgage is a type of mortgage in which the interest rate applied on the outstanding balance varies throughout the life of the loan");
$defarm = getItem($arms);

$frms = array("A mortgage in which the interest rate remains fixed for the length of the term","A mortgage in which the interest rate does not change throughout the term","A mortgage in which the monthly payment based on interest does not change");
$deffrm = getItem($frms);


$method = array("b","strong","i","em");
$methods = array_merge($method,$method,$method);
$highlight = getItem($methods);

$browsers = array("Google Chrome"=>"https://www.google.com/chrome/browser/desktop/index.html","Firefox"=>"https://www.mozilla.org/en-US/firefox/new/","Internet Explorer"=>"https://support.microsoft.com/en-us/help/17621/internet-explorer-downloads","Safari"=>"https://www.apple.com/safari/","Opera"=>"http://www.opera.com/","Microsoft Edge"=>"https://www.microsoft.com/en-us/windows/microsoft-edge","Opera Mini"=>"http://www.opera.com/mobile","Maxthon Browser"=>"http://www.maxthon.com/","Vivaldi"=>"https://vivaldi.com/?lang=en_US","Konquerer"=>"https://konqueror.org/features/browser.php","Flock"=>"https://web.flock.com/?");

$marks = array("Yes","yes","+","Y","&#x2714;");
$mark = getItem($marks);

$borders = array(1,2,3);
$border = getItem($borders);
$tborderwidth = getItem($borders);

$borderstyles = array("dotted","dashed","solid","none");
$borderstyle = getItem($borderstyles);
$tborderstyle = getItem($borderstyles);


$fonts = array("arial","calibri","verdana","sans-serif");
$font = getItem($fonts);

$sizes = array(.9,1,1.1);
$size = getItem($sizes);

$h1s = array(.3,.4,.5);
$h1size = $size+getItem($h1s);

$h2s = array(.1,.2,.3);
$h2size = $size+getItem($h2s);

$darks = array(333,222,111,"000");
$dark = getItem($darks);
$fdark = getItem($darks);

$lights = array("ccc","eee","fff","e3e3e3");
$light = getItem($lights);

$paddings = array(3,5,7,10);
$padding = getItem($paddings);

$margins = array(5,10,15,20);
$margin = getItem($margins);


$twidths = array(90,91,92,93,94,95,96,97,98,99,199);
$twidth = getItem($twidths);

$hpos = array("center","left");
$hpo = getItem($hpos);

$mpages = array("mortgage-loan","mortgage","mortgage-backed-securities");
$mpage = getItem($mpages);

$defrates = array('','','','mortgage home ownership'.'financereference mortgage','mortgage finance reference');
$defrate = getItem($defrates);

$s = array();

?><html>
<head>
<title><?php echo $title; ?></title>
<meta name='description' content="<?php echo $description; ?>">
<style type='text/css'>
body {
	font-family: <?php echo $font; ?>;
	font-size: <?php echo $size; ?>em;
	color: #<?php echo $fdark; ?>;
	background: #fff;
	margin: <?php echo $margin; ?>;
	padding: <?php echo $padding; ?>;
}
h1 {
	font-size: <?php echo $h1size; ?>em;
	text-align: <?php echo $hpo; ?>;
}
h2 {
	font-size: <?php echo $h2size; ?>em;
}
thead {
	background: #<?php echo $dark; ?>;
	color: #<?php echo $light; ?>;
}

</style>
</head>
<body>
<h1><?php echo $h1; ?></h1>
<?php ob_start(); ?>
<h2><?php echo $h2; ?></h2>
<table style='width:100%' border='0' cellpadding='5'>
<tr><td><<?php echo $highlight; ?>>Mortgage</<?php echo $highlight; ?>></td><td>[<a target='_blank' href='https://en.wikipedia.org/wiki/Mortgage_loan'>wikipedia</a>] <?php echo $defmortgage; ?></td></tr>
<tr><td><<?php echo $highlight; ?>>Interest Rate</<?php echo $highlight; ?>></td><td>[<a target='_blank' href='http://www.dictionary.com/browse/interest-rate'>dictionary</a>] <?php echo $definterestrate; ?></td></tr>
<tr><td><<?php echo $highlight; ?>>Term</<?php echo $highlight; ?>></td><td>[<a target='_blank' href='https://www.mtgprofessor.com/glossary.htm#LetterT'>mtgprofessor</a>] <?php echo $defterm; ?></td></tr>
<tr><td><<?php echo $highlight; ?>>Adjustable Rate Mortgage</<?php echo $highlight; ?>></td><td>[<a target='_blank' href='http://www.investopedia.com/terms/a/arm.asp'>investopedia</a>] <?php echo $defarm; ?></td></tr>
<tr><td><<?php echo $highlight; ?>>Fixed Rate Mortgage</<?php echo $highlight; ?>></td><td>[<a target='_blank' href='http://www.bankrate.com/finance/mortgages/fixed-rate-mortgages-1.aspx'>bankrate</a>] <?php echo $deffrm; ?></td></tr>
</table>
<hr>
<div align='center'>
	<h2>Interests Rates & Home Ownership Rates</h2>
	<a href='http://www.financereference.com/learn/interest-rates'><img id='rates' style='border-color:#000;border-style:<?php echo $borderstyle;?>;border-width:<?php echo $border; ?>px' alt='<?php echo $defrate; ?>' src='http://www.financereference.com/interest-rates.png'></a><br />
<br />	<a href='http://www.financereference.com/learn/<?php echo $mpage;?>'><img id='home ownership' style='border-color:#000;border-style:<?php echo $borderstyle;?>;border-width:<?php echo $border; ?>px' alt='<?php echo $defhome;?>' src='http://www.financereference.com/home-ownership.jpg'></a>
</div>

<hr>
<div align='center'>
<div style='margin:10px;width:90%;padding:10px;background:#eee;text-align:center;'>
<script>document.write("Javascript is Enabled, the Calculator should function properly");</script><noscript>Javascript is Disabled, this will cause the calculator to malfunction</noscript>
</div>
<table style='border-width:<?php echo $tborderwidth; ?>px;border-style:<?php echo $tborderstyle; ?>;border-color:#000;text-align:left;' width='<?php echo $twidth; ?>%' border='0' cellspacing='0' cellpadding='<?php echo $padding; ?>'>
	<thead>
		<tr>
			<th>Browser</th>
			<th style='text-align:center;'>Link</th>
			<th style='text-align:center;'>Enable JS</th>
			<th style='text-align:center;'>Compatible?</th>
		</tr>
	</thead>
<?php

	foreach($browsers as $browser=>$link) {
		$p = parse_url($link);
		$domain = $p['host'];
		echo "<tr><td>$browser</td><td style='text-align:center;'><a target='_blank' href='$link'>$domain</a></td><td style='text-align:center'><a target='_blank' href='https://google.com/search?q=enable+javascript+on+$browser'>Enable JS on $browser</a></td><td style='text-align:center'>$mark</td></tr>";
	}

?>
</table>
</div>
<?php 

$s = ob_get_contents(); 
ob_end_clean();

?>

<?php

$s = explode("<hr>",$s);

$all = array_merge($s,$s,$s,$s,$s,$s,$s,$s,$s);

$y = substr($contentSeed,$x,1);
for($i=$y;$i<$y+3;$i++) {
	echo "<hr>";
	echo $all[$i];
}

?>

</body>
</html>
