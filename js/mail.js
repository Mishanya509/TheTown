function deleteMail(mail){
	var letterid = mail.getAttribute("data-letterid");
	refreshMail("?delete=" + letterid);
}