<?php
$path=$_SERVER["REQUEST_URI"];
$path_parts = pathinfo($path);  //這邊的$path_parts會是一個陣列，裡面的元素就是我們要的資訊。
$path_name = $path_parts["filename"].".php";  //輸出結果：myweb.php

//單元設定
switch($path_name){
	case "admin_user.php":
	case "admin_user_ins.php":
	case "admin_user_edit.php":
	case "admin_user_edit1.php":
	case "admin_user_del.php":
		$menu_overview = "";
		$unit_overview = "admin_user";
		break;
	case "banner.php":
	case "banner_ins.php":
	case "banner_edit.php":
	case "banner_edit1.php":
		$menu_overview = "index_manage";
		$unit_overview = "banner";
		break;
	case "news.php":
	case "news_ins.php":
	case "news_edit.php":
	case "news_edit1.php":
	case "news_del.php":
		$menu_overview = "news_manage";
		$unit_overview = "news";
		break;
	case "news_mark.php":
	case "news_mark_ins.php":
	case "news_mark_edit.php":
	case "news_mark_edit1.php":
		$menu_overview = "news_manage";
		$unit_overview = "news_mark";
		break;
	case "introduction.php":
	case "introduction_edit.php":
	case "introduction_edit_1.php":
		$menu_overview = "introduction_manage";
		$unit_overview = "introduction";
		break;
	case "organization.php":
	case "organization_edit.php":
	case "organization_edit_1.php":
	case "organization_edit_2.php":
		$menu_overview = "introduction_manage";
		$unit_overview = "organization";
		break;
	case "director.php":
	case "director_ins.php":
	case "director_edit.php":
	case "director_edit_1.php":
	case "director_del.php":
		$menu_overview = "governance_manage";
		$unit_overview = "director";
		break;
	case "director_content.php":
	case "director_content_edit.php":
	case "director_content_edit_1.php":
	case "director_content_edit_2.php":
		$menu_overview = "governance_manage";
		$unit_overview = "director_content";
		break;
	case "audit.php":
	case "audit_ins.php":
	case "audit_edit.php":
	case "audit_edit_1.php":
	case "audit_del.php":
		$menu_overview = "governance_manage";
		$unit_overview = "audit";
		break;
	case "audit_content.php":
	case "audit_content_edit.php":
	case "audit_content_edit_1.php":
	case "audit_content_edit_2.php":
		$menu_overview = "governance_manage";
		$unit_overview = "audit_content";
		break;
	case "remuneration.php":
	case "remuneration_ins.php":
	case "remuneration_edit.php":
	case "remuneration_edit_1.php":
	case "remuneration_del.php":
		$menu_overview = "governance_manage";
		$unit_overview = "remuneration";
		break;
	case "remuneration_content.php":
	case "remuneration_content_edit.php":
	case "remuneration_content_edit_1.php":
	case "remuneration_content_edit_2.php":
		$menu_overview = "governance_manage";
		$unit_overview = "remuneration_content";
		break;
	case "sustain_committee.php":
	case "sustain_committee_ins.php":
	case "sustain_committee_edit.php":
	case "sustain_committee_edit_1.php":
	case "sustain_committee_del.php":
		$menu_overview = "governance_manage";
		$unit_overview = "sustain_committee";
		break;
	case "sustain_committee_content.php":
	case "sustain_committee_content_edit.php":
	case "sustain_committee_content_edit_1.php":
	case "sustain_committee_content_edit_2.php":
		$menu_overview = "governance_manage";
		$unit_overview = "sustain_committee_content";
		break;
	case "company_regulations.php":
	case "company_regulations_ins.php":
	case "company_regulations_edit.php":
	case "company_regulations_edit_1.php":
	case "company_regulations_del.php":
		$menu_overview = "governance_manage";
		$unit_overview = "company_regulations";
		break;
	case "company_regulations_en.php":
	case "company_regulations_en_ins.php":
	case "company_regulations_en_edit.php":
	case "company_regulations_en_edit_1.php":
	case "company_regulations_en_del.php":
		$menu_overview = "governance_manage";
		$unit_overview = "company_regulations_en";
		break;
	case "internal_audit.php":
	case "internal_audit_edit.php":
	case "internal_audit_edit_1.php":
	case "internal_audit_edit_2.php":
		$menu_overview = "governance_manage";
		$unit_overview = "internal_audit";
		break;
	case "financial_statements.php":
	case "financial_statements_ins.php":
	case "financial_statements_edit.php":
	case "financial_statements_edit_1.php":
	case "financial_statements_del.php":
		$menu_overview = "finance_manage";
		$unit_overview = "financial_statements";
		break;
	case "message.php":
	case "message_edit.php":
	case "message_edit_1.php":
	case "message_edit_2.php":
		$menu_overview = "finance_manage";
		$unit_overview = "message";
		break;
	case "conference.php":
	case "conference_ins.php":
	case "conference_edit.php":
	case "conference_edit_1.php":
	case "conference_del.php":
		$menu_overview = "finance_manage";
		$unit_overview = "conference";
		break;
	case "shareholders_meeting.php":
	case "shareholders_meeting_ins.php":
	case "shareholders_meeting_edit.php":
	case "shareholders_meeting_edit_1.php":
	case "shareholders_meeting_del.php":
		$menu_overview = "stock_manage";
		$unit_overview = "shareholders_meeting";
		break;
	case "shareholders_meeting_en.php":
	case "shareholders_meeting_en_ins.php":
	case "shareholders_meeting_en_edit.php":
	case "shareholders_meeting_en_edit_1.php":
	case "shareholders_meeting_en_del.php":
		$menu_overview = "stock_manage";
		$unit_overview = "shareholders_meeting_en";
		break;
	case "dividend.php":
	case "dividend_edit.php":
	case "dividend_edit_1.php":
	case "dividend_edit_2.php":
		$menu_overview = "stock_manage";
		$unit_overview = "dividend";
		break;
	case "sustainability_reports.php":
	case "sustainability_reports_ins.php":
	case "sustainability_reports_edit.php":
	case "sustainability_reports_edit_1.php":
	case "sustainability_reports_del.php":
		$menu_overview = "sustainable_manage";
		$unit_overview = "sustainability_reports";
		break;
	case "sustainability_reports_en.php":
	case "sustainability_reports_en_ins.php":
	case "sustainability_reports_en_edit.php":
	case "sustainability_reports_en_edit_1.php":
	case "sustainability_reports_en_del.php":
		$menu_overview = "sustainable_manage";
		$unit_overview = "sustainability_reports_en";
		break;
	case "environmental_sustainability.php":
	case "environmental_sustainability_edit.php":
	case "environmental_sustainability_edit_1.php":
	case "environmental_sustainability_edit_2.php":
		$menu_overview = "sustainable_manage";
		$unit_overview = "environmental_sustainability";
		break;
	case "stakeholders.php":
	case "stakeholders_edit.php":
	case "stakeholders_edit_1.php":
	case "stakeholders_edit_2.php":
		$menu_overview = "sustainable_manage";
		$unit_overview = "stakeholders";
		break;
	case "login_log.php":
		$menu_overview = "log_manage";
		$unit_overview = "login";
		break;
	case "ins_log.php":
		$menu_overview = "log_manage";
		$unit_overview = "ins";
		break;
	case "edit_log.php":
		$menu_overview = "log_manage";
		$unit_overview = "edit";
		break;
	case "del_log.php":
		$menu_overview = "log_manage";
		$unit_overview = "del";
		break;
	default:
		$menu_overview = "";
		$unit_overview = "";
		break;
}
?>