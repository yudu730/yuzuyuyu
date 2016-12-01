function queCon(){
	/*質問内容を入力*/
	q1var = "質問1";
	q2var = "質問2";
	q3var = "質問3";

	/*質問1の答えを入力*/
	q1Rad1="答え1";
	q1Rad2="答え2";
	q1Rad3="答え3";

	/*質問2の答えを入力*/
	q2Rad1="答え1";
	q2Rad2="答え2";
	q2Rad3="答え3";

	/*質問3の答えを入力*/
	q3Rad1="答え1";
	q3Rad2="答え2";
	q3Rad3="答え3";
	q3Rad4="答え4";


	document.getElementById("q1Con").innerHTML=q1var;
	document.getElementById("q2Con").innerHTML=q2var;
	document.getElementById("q3Con").innerHTML=q3var;

	document.getElementById("q1ConSel1").innerHTML=q1Rad1;
	document.getElementById("q1ConSel2").innerHTML=q1Rad2;
	document.getElementById("q1ConSel3").innerHTML=q1Rad3;


	document.getElementById("q2ConSel1").innerHTML=q2Rad1;
	document.getElementById("q2ConSel2").innerHTML=q2Rad2;
	document.getElementById("q2ConSel3").innerHTML=q2Rad3;


	document.getElementById("q3ConSel1").innerHTML=q3Rad1;
	document.getElementById("q3ConSel2").innerHTML=q3Rad2;
	document.getElementById("q3ConSel3").innerHTML=q3Rad3;
	document.getElementById("q3ConSel4").innerHTML=q3Rad4;

	
}