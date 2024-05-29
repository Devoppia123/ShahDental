function loadContent(url, handler) {

	var xmlHttp = null;
	if (window.XMLHttpRequest) xmlHttp = new XMLHttpRequest();
	else if (window.ActiveXObject) {
		var msxmlVer = new Array(
			"Msxml2.XMLHTTP.5.0",
			"Msxml2.XMLHTTP.4.0",
			"Msxml2.XMLHTTP.3.0",
			"Msxml2.XMLHTTP",
			"Microsoft.XMLHTTP"
		);
		for (var i = 0; i < msxmlVer.length; i++) {
			try { // use the most recent version of Msxml installed on user's system
				xmlHttp = new ActiveXObject(msxmlVer[i]);
				break;
			} catch (e) { }
		} // end for()
	} // end else if()
	if (!xmlHttp) return false; // return "false" if XMLHttpRequest WAS NOT successful

	xmlHttp.open('GET', url, true);
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4)
			handler(xmlHttp.responseText);



		if (xmlHttp.readyState == 2)
			handler("loading");
	}
	xmlHttp.send(null);
}

function loadContentOne(url, handler) {

	var xmlHttp = null;
	if (window.XMLHttpRequest) xmlHttp = new XMLHttpRequest();
	else if (window.ActiveXObject) {
		var msxmlVer = new Array(
			"Msxml2.XMLHTTP.5.0",
			"Msxml2.XMLHTTP.4.0",
			"Msxml2.XMLHTTP.3.0",
			"Msxml2.XMLHTTP",
			"Microsoft.XMLHTTP"
		);
		for (var i = 0; i < msxmlVer.length; i++) {
			try { // use the most recent version of Msxml installed on user's system
				xmlHttp = new ActiveXObject(msxmlVer[i]);
				break;
			} catch (e) { }
		} // end for()
	} // end else if()
	if (!xmlHttp) return false; // return "false" if XMLHttpRequest WAS NOT successful

	xmlHttp.open('GET', url, true);
	xmlHttp.onreadystatechange = function () {
		if (xmlHttp.readyState == 4) {
			handler(xmlHttp.responseText);
			checkFill();
		}

		if (xmlHttp.readyState == 2)
			handler("loading");
	}
	xmlHttp.send(null);
}

function sampleContentHandler(content) {

	document.getElementById("subcat_container").innerHTML = content

}


function sampleDoQuery() {

	var cat_id = document.getElementById("cat_id").value;
	if (cat_id != 0) {
		var url = "get-sub-cat.php?cat_id=" + document.getElementById("cat_id").value;
		//alert(url);
		loadContent(url, sampleContentHandler)
	}
}


function spContentHandler(content) {

	document.getElementById("sp_container").innerHTML = content

}


function getSpecialists() {

	var sp_id = document.getElementById("speciality").value;
	if (sp_id != 0) {
		var url = "get-doctor-by-speciality.php?sp_id=" + sp_id;
		loadContent(url, spContentHandler)
	}
}


function getSpecialistsSlots() {

	var sp_id = document.getElementById("speciality").value;
	if (sp_id != 0) {
		var url = "get-doctor-by-speciality-slot.php?sp_id=" + sp_id;
		loadContent(url, spContentHandler)
	}
}



function getMessageUsers() {

	var sp_id = document.getElementById("utype").value;
	var did = document.getElementById("doc_id").value;
	if (sp_id != 0) {
		var url = "get-message-users.php?typeid=" + sp_id + "&docid=" + did;
		//alert(url);
		loadContent(url, spContentHandler)
	}
}


function messageContentHandler(content) {

	document.getElementById("message_container").innerHTML = content

}

function getDocDetail() {


	var did = document.getElementById("docid").value;
	if (did != 0) {
		var url = "get-doc-details.php?docid=" + did;
		//alert(url);
		loadContent(url, docDetailContentHandler)
	}
}


function docDetailContentHandler(content) {

	document.getElementById("doc_container").innerHTML = content

}


function getMessageDetails(mid) {


	var message_id = mid;
	if (message_id != 0) {
		var url = "get-message-details.php?id=" + message_id;
		//alert(url);
		loadContent(url, messageContentHandler)
	}

}

function getMessageDetailsDoctor(mid) {


	var message_id = mid;
	if (message_id != 0) {
		var url = "get-message-details-doctor.php?id=" + message_id;
		//alert(url);
		loadContent(url, messageContentHandler)
	}

}


function getSentMessageDetails(mid) {


	var message_id = mid;
	if (message_id != 0) {
		var url = "get-sent-message-details.php?id=" + message_id;
		//alert(url);
		loadContent(url, messageContentHandler)
	}

}


function getSentMessageDetailsDoctor(mid) {


	var message_id = mid;
	if (message_id != 0) {
		var url = "get-sent-message-details-doctor.php?id=" + message_id;
		//alert(url);
		loadContent(url, messageContentHandler)
	}

}

function getSpecialistsRoster() {
	var apdate = document.getElementById("apdate").value;
	var sp_id = document.getElementById("speciality").value;
	if (sp_id != 0 && apdate != "") {
		var url = "get-doctor-by-speciality-roster.php?sp_id=" + sp_id + "&apdate=" + apdate;
		loadContent(url, spContentHandler);
	}
}

function addSpecialityContentHandler(content) {
	document.getElementById("sp_content_box").innerHTML = content
}

function addSpeciality() {
	var sid, did;
	sid = document.getElementById("speciality").value;
	did = document.getElementById("doctor_id").value;

	if (sid != 0) {
		var url = "add-doc-sp.php?sp_id=" + sid + "&doc_id=" + did;
		loadContent(url, addSpecialityContentHandler);
	}
}

function addStaffContentHandler(content) {
	document.getElementById("sp_content_box").innerHTML = content
}

function addStaff() {
	var sid, did;
	sid = document.getElementById("staff").value;
	did = document.getElementById("doctor_id").value;

	if (sid != 0) {
		var url = "add-doc-staff.php?s_id=" + sid + "&doc_id=" + did;
		loadContent(url, addStaffContentHandler);
	}
}

function addInsuranceContentHandler(content) {
	document.getElementById("ins_content_box").innerHTML = content
}

function addInsurance() {
	var iid, did;
	iid = document.getElementById("insurance").value;
	did = document.getElementById("doctor_id").value;

	if (iid != 0) {
		var url = "add-doc-insurance.php?i_id=" + iid + "&doc_id=" + did;
		loadContent(url, addInsuranceContentHandler);
	}
}
function addEducationContentHandler(content) {
	document.getElementById("edu_content_box").innerHTML = content
}

function addEducation() {
	var eid, did;
	eid = document.getElementById("degree").value;
	did = document.getElementById("doctor_id").value;
	if (eid != "") {
		var url = "add-doc-edu.php?edu=" + eid + "&doc_id=" + did;
		loadContent(url, addEducationContentHandler);
	}
}

function addDiseaseContentHandler(content) {
	document.getElementById("edu_content_box").innerHTML = content
}

function addDisease() {
	var eid, did;
	eid = document.getElementById("disease").value;
	did = document.getElementById("doctor_id").value;
	if (eid != "") {
		var url = "add-doc-dis.php?edu=" + eid + "&doc_id=" + did;
		loadContent(url, addDiseaseContentHandler);
	}
}

function addLanguageContentHandler(content) {
	document.getElementById("lang_content_box").innerHTML = content
}

function addLanguage() {
	var lid, did;
	lid = document.getElementById("language").value;
	did = document.getElementById("doctor_id").value;

	if (lid != 0) {
		var url = "add-doc-lang.php?lang_id=" + lid + "&doc_id=" + did;
		loadContent(url, addLanguageContentHandler);
	}
}

function deleteSpecialityContentHandler(content) {
	document.getElementById("sp_content_box").innerHTML = content
}

function deleteSpeciality(sid) {
	var sid, did;
	//sid = document.getElementById("speciality").value;
	did = document.getElementById("doctor_id").value;
	if (sid != 0) {
		var url = "delete-doc-sp.php?sp_id=" + sid + "&doc_id=" + did;
		loadContent(url, deleteSpecialityContentHandler);
	}
}

function deleteStaffContentHandler(content) {
	document.getElementById("sp_content_box").innerHTML = content
}

function deleteStaff(sid) {
	var sid, did;
	//sid = document.getElementById("speciality").value;
	did = document.getElementById("doctor_id").value;
	if (sid != 0) {
		var url = "delete-doc-staff.php?s_id=" + sid + "&doc_id=" + did;
		loadContent(url, deleteStaffContentHandler);
	}
}

function deleteInsuranceContentHandler(content) {
	document.getElementById("ins_content_box").innerHTML = content
}

function deleteInsurance(iid) {
	var iid, did;
	//sid = document.getElementById("speciality").value;
	did = document.getElementById("doctor_id").value;
	if (iid != 0) {
		var url = "delete-doc-insurance.php?i_id=" + iid + "&doc_id=" + did;
		loadContent(url, deleteInsuranceContentHandler);
	}
}

function deleteEducationContentHandler(content) {
	document.getElementById("edu_content_box").innerHTML = content
}

function deleteEducation(eid) {
	var eid, did;
	//sid = document.getElementById("speciality").value;
	did = document.getElementById("doctor_id").value;
	if (eid != 0) {
		var url = "delete-doc-edu.php?edu_id=" + eid + "&doc_id=" + did;
		loadContent(url, deleteEducationContentHandler);
	}
}

function deleteDiseaseContentHandler(content) {
	document.getElementById("edu_content_box").innerHTML = content
}

function deleteDisease(eid) {
	var eid, did;
	//sid = document.getElementById("speciality").value;
	did = document.getElementById("doctor_id").value;
	if (eid != 0) {
		var url = "delete-doc-dis.php?edu_id=" + eid + "&doc_id=" + did;
		loadContent(url, deleteDiseaseContentHandler);
	}
}

function deleteLanguageContentHandler(content) {
	document.getElementById("lang_content_box").innerHTML = content
}

function deleteLanguage(lid) {
	var lid, did;
	//lid = document.getElementById("language").value;
	did = document.getElementById("doctor_id").value;

	if (lid != 0) {
		var url = "delete-doc-lang.php?lang_id=" + lid + "&doc_id=" + did;
		loadContent(url, deleteLanguageContentHandler);
	}
}

function addPatientSpecialityContentHandler(content) {
	document.getElementById("sp-container").innerHTML = content
}

function addPatientSpeciality() {
	var sid;
	sid = document.getElementById("speciality").value;
	if (sid != 0) {
		var url = "add-patient-sp.php?sp_id=" + sid;
		loadContent(url, addPatientSpecialityContentHandler);
	}
}

function delPatientSp(uid, id) {

	var url = "delete-patient-sp.php?id=" + id;
	loadContent(url, addPatientSpecialityContentHandler)

}

function addPatientSpecialistContentHandler(content) {
	document.getElementById("doc-container").innerHTML = content
}

function addPatientSpecialist() {
	var sid;
	sid = document.getElementById("specialist").value;
	if (sid != 0) {
		var url = "add-patient-doc.php?doc_id=" + sid;
		loadContent(url, addPatientSpecialistContentHandler);
	}
}

function delPatientDoc(uid, id) {

	var url = "delete-patient-doc.php?id=" + id;
	loadContent(url, addPatientSpecialistContentHandler)

}

function delPatientHelthTopic(id) {

	var url = "delete-patient-htopic.php?id=" + id;
	loadContent(url, addPatientSpecialistContentHandler)

}

function healthTopicsContentHandler(content) {
	document.getElementById("doc-container").innerHTML = content
}

function addHealthTopic() {
	var spid;
	spid = document.getElementById("speciality").value;
	if (spid != 0) {
		var url = "get-health-topics.php?sp_id=" + spid;
		loadContent(url);
	}
}

function immunizationContentHandler(content) {
	document.getElementById("imm-container").innerHTML = content
}

function addImmunization(immunid) {
	var immid;
	immid = immunid;
	if (immid != 0) {
		var url = "get-immunization-form.php?imm_id=" + immid;
		loadContent(url, immunizationContentHandler);
	}
}

function medicationContentHandler(content) {
	document.getElementById("imm-container").innerHTML = content
}

function addMedication(mediid) {
	var medid;
	medid = mediid;
	if (medid != 0) {
		var url = "get-medication-form.php?med_id=" + medid;
		loadContent(url, medicationContentHandler);
	}
}
function allergyContentHandler(content) {
	document.getElementById("imm-container").innerHTML = content
}

function addAllergy(aleid) {
	var alid;
	alid = aleid;
	if (alid != 0) {
		var url = "get-allergy-form.php?ale_id=" + alid;
		loadContent(url, allergyContentHandler);
	}
}

function appContentHandler(content) {
	document.getElementById("app-container").innerHTML = content
}

function viewApp(month, year) {
	if (year != 0) {
		var url = "get-patient-appointment.php?month=" + month + "&year=" + year;
		loadContent(url, appContentHandler);
	}
}


function dateContentHandler(content) {
	document.getElementById("date_container").innerHTML = content
}


function getProcedureDates() {
	var sp_id = document.getElementById("proc").value;
	//alert(sp_id);
	if (sp_id != 0) {
		var url = "get-procedure-dates.php?sp_id=" + sp_id;
		loadContent(url, dateContentHandler)
	}
}



function doctorContentHandler(content) {
	document.getElementById("doctor_container").innerHTML = content
}


function getProcedureDoctor() {
	var date = document.getElementById("date").value;
	var sp_id = document.getElementById("proc").value;
	if (sp_id != 0) {
		var url = "get-procedure-doctor.php?spid=" + sp_id + "&date=" + date;
		loadContent(url, doctorContentHandler)
	}
}


function slotContentHandler(content) {
	document.getElementById("slot_container").innerHTML = content;
	//checkFill();
}


function getSlots() {
	var date = document.getElementById("date").value;
	var sp_id = document.getElementById("proc").value;
	var doc_id = document.getElementById("doctor").value;


	if (sp_id != 0) {
		var url = "get-procedure-slots.php?spid=" + sp_id + "&date=" + date + "&docid=" + doc_id;
		loadContent(url, slotContentHandler)
	}
}

function getAppointmentSlots() {
	//document.getElementById("slotdata").style.display = "block";
	var date = document.getElementById("datepicker").value;
	var doc_id = document.getElementById("specialist").value;

	//alert(date + " " + doc_id);

	if (doc_id != 0) {
		var url = "get-slots-for-appointment.php?date=" + date + "&docid=" + doc_id;
		//alert(url); 
		loadContentOne(url, slotContentHandler)

	}
}



function doctorContentHandler(content) {

	document.getElementsByClassName("search-by-letter2").innerHTML = content

}


// function for tabs      

function specContentHandler(content) {

	document.getElementById("tabs-2").innerHTML = content

}

function getSpecialist(sp_id) {

	$("#tabs").tabs("option", "disabled", [0, 2]);
	var sp_id = sp_id;
	if (sp_id != 0) {
		var url = "get-specialist.php?sp_id=" + sp_id;
		loadContent(url, specContentHandler)
	}
}

function appointmentformContentHandler(content) {

	document.getElementById("sp_container").innerHTML = content

}




function getSearchRecords() {

	/*   var keyword,
   keywordelement = document.getElementById('search');
   if (keywordelement != null) {
	   keyword = keywordelement.value;
   }
   else {
	   keyword = null;
   }
   
	  var searchfor,
   searchforelement = document.getElementById('searchfor');
   if (searchforelement != null) {
	   searchfor = searchforelement.value;
   }
   else {
	   searchfor = null;
   }  */

	var keyword = document.getElementById('search').value;

	if (keyword != "") {
		//  alert(keyword);  
		//  var url = "get-search-records.php?keyword="+keyword+"&searchfor="+searchfor;
		var url = "get-search-records.php?keyword=" + keyword;
		//alert(url);     
		loadContent(url, SearchRecordsContentHandler);
	} else {
		document.getElementById("searchContent").innerHTML = '';
		document.getElementById("doc").innerHTML = 0;
		document.getElementById("sub_sp").innerHTML = 0;
		document.getElementById("sp").innerHTML = 0;
		document.getElementById("totalresult").innerHTML = 0 + ' Result(s)';
	}

}


function SearchRecordsContentHandler(content) {

	document.getElementById("searchContent").innerHTML = content;
	if (document.getElementById("docrec") == null) { }
	else { document.getElementById("doc").innerHTML = document.getElementById("docrec").value; }
	if (document.getElementById("subsepcrec") == null) { }
	else { document.getElementById("sub_sp").innerHTML = document.getElementById("subsepcrec").value; }
	if (document.getElementById("specrec") == null) { }
	else { document.getElementById("sp").innerHTML = document.getElementById("specrec").value; }
	if (document.getElementById("docrec") == null) { }
	else {
		document.getElementById("totalresult").innerHTML = parseInt(document.getElementById("docrec").value) + parseInt(document.getElementById("subsepcrec").value) + parseInt(document.getElementById("specrec").value) + " Result(s)";
		//     document.getElementById("totalresult").innerHTML = document.getElementById("docrec").value() + document.getElementById("subsepcrec").value + document.getElementById("specrec").value;
	}
}





function getAppointmentform(docid) {

	$("#tabs").tabs("option", "active", 2)
	$("#tabs").tabs("option", "disabled", [0, 1]);
	var tab = "#tabs-3";
	$('#tabs').tabs('select', tab);
	var docid = docid;
	if (docid != 0) {
		var url = "get-appointment-form.php?docid=" + docid;
		loadContent(url, appointmentformContentHandler)

	}
	$("#tabs").tabs("option", "disabled", [0, 1]);
}

function backTofirstTab() {


	$("#tabs").tabs("option", "active", 0)
	$("#tabs").tabs("option", "disabled", [1, 2]);
	var tab = "#tabs-1";
	$('#tabs').tabs('select', tab);
	$("#tabs").tabs("option", "disabled", [1, 2]);
}

function backTosecondTab() {


	$("#tabs").tabs("option", "active", 1)
	$("#tabs").tabs("option", "disabled", [0, 2]);
	var tab = "#tabs-2";
	$('#tabs').tabs('select', tab);
	$("#tabs").tabs("option", "disabled", [0, 2]);
}

function getSearchDoctors(option) {

	var opt = option;
	var keyword = document.getElementById('doctor').value;
	var docId = document.getElementById('doctors').value;
	var fdocId = document.getElementById('fdoctors').value;
	var spec = document.getElementById('spec').value;
	var fspec = document.getElementById('fspec').value;

	if (keyword != "") {
		// alert(keyword);

		$.ajax({
			type: "get",
			url: "search-keywoard-doctor",
			data: {
				"_token": "{{ csrf_token() }}",
				"data": keyword
			},
			dataType: 'json',
			success: function(response) {
				let html = '';
				if (response == "") {

					html += '<div> 0  Doctor</div>';

				} else {
					$.each(response, function(i, result) {

						html += '<span class="file" id="file_' + result.doctorID + '">' + result
							.doctorFName +
							'</span> &nbsp;';
						html += '<span class="file" id="file_' + result.doctorID + '">' + result
							.doctorLName +
							'</span> <br/>';
						html +=
							'<span onclick="showDetails(this)" data-animal-type="' + result
							.doctorID +
							'" class="nxt-btn btn btn-success action-button">Get Appointment</span>';

					});
				}



				// Append the built HTML to a DOM element of your choice

				$('#docsearch_result').empty().append(html);

			}
		});

	}

	if (docId != 0) {
		// alert(docId);
		$.ajax({
			type: "get",
			url: "search-all-doctor",
			data: {
				"_token": "{{ csrf_token() }}",
				"all_doct_id": docId
			},
			dataType: 'json',
			success: function(response) {
				let html = '';
				$.each(response, function(i, result) {
					// html += '<div class="file" id="file_' + result.doctorID + '">' + result
					// 	.doctorID +
					// 	'</div>';
					html += '<span class="file" id="file_' + result.doctorID + '">' + result
						.doctorFName +
						'</span> &nbsp;';
					html += '<span class="file" id="file_' + result.doctorID + '">' + result
						.doctorLName +
						'</span> <br/>';
					html +=
						'<span onclick="showDetails(this)" data-animal-type="' + result
						.doctorID +
						'" class="nxt-btn btn btn-success action-button">Get Appointment</span>';

				});
				// Append the built HTML to a DOM element of your choice

				$('#docsearch_result').empty().append(html);
			}
		});
	}

	if (fdocId != 0) {
		// alert(fdocId);
		$.ajax({
			type: "get",
			url: "search-favorite-doctor",
			data: {
				"_token": "{{ csrf_token() }}",
				"favorite_doct_id": fdocId
			},
			dataType: 'json',
			success: function(response) {
				let html = '';
				$.each(response, function(i, result) {
					// html += '<div class="file" id="file_' + result.doctorID + '">' + result
					// 	.doctorID +
					// 	'</div>';
					html += '<span class="file" id="file_' + result.doctorID + '">' + result
						.doctorFName +
						'</span> &nbsp;';
					html += '<span class="file" id="file_' + result.doctorID + '">' + result
						.doctorLName +
						'</span> <br/>';
					html +=
						'<span onclick="showDetails(this)" data-animal-type="' + result
						.doctorID +
						'" class="nxt-btn btn btn-success action-button">Get Appointment</span>';
				});
				// Append the built HTML to a DOM element of your choice

				$('#docsearch_result').empty().append(html);
			}
		});


	}

	if (spec != 0) {
		$.ajax({
			type: "get",
			url: "speciality-all-doctor",
			data: {
				"_token": "{{ csrf_token() }}",
				"spec_doctor_id": spec
			},
			dataType: 'json',
			success: function(response) {
				let html = '';

				if (response == "") {
					html += '<div> 0 Doctor</div>';
				} else {
					$.each(response, function(i, result) {
						html += '<span class="file" id="file_' + result.doctorID + '">' + result
							.doctorFName +
							'</span> &nbsp;';
						html += '<span class="file" id="file_' + result.doctorID + '">' + result
							.doctorLName +
							'</span> <br/>';
						html +=
							'<span onclick="showDetails(this)" data-animal-type="' + result
							.doctorID +
							'" class="nxt-btn btn btn-success action-button">Get Appointment</span>';

					});
				}

				// Append the built HTML to a DOM element of your choice
				$('#docsearch_result').empty().append(html);
			}
		});


	}

}


function SearchDoctorContentHandler(content) {

	document.getElementById("docsearch").innerHTML = content;


}

// new appointment system   

function getDoctorDetails(doc_id) {

	var date = document.getElementById("datepicker").value;

	var doc_id = doc_id;
	if (doc_id != 0) {
		var url = "get-doctor-details.php?doc_id=" + doc_id + "&date=" + date;
		//   alert(url);
		loadContent(url, DoctorDetailsContentHandler)
	}
}

function DoctorDetailsContentHandler(content) {

	document.getElementById("selc-doc").innerHTML = content

}


function showdoctorss() {

	var url = "show-doctors-details.php";
	loadContent(url, ShowDoctorDetailsContentHandler)

}


function ShowDoctorDetailsContentHandler(content) {

	document.getElementById("showoption").innerHTML = content
}


function getDoctorAppointForm(docId, date) {
	var docId = docId;
	var dates = date;
	// alert(dates);
	var url = "get-doctor-confirm.php?doc_id=" + docId + "&date=" + dates;
	loadContent(url, getDoctorAppointFormContentHandler)

}


function getDoctorAppointFormContentHandler(content) {

	document.getElementById("app-confirm-d").innerHTML = content

}


function CheckTextbox() {
	if (document.getElementById('doctor').disabled) { //here
		alert("Please Select The Date First !");
	}
}
function CheckTextbox1() {
	if (document.getElementById('spec').disabled) { //here
		alert("Please Select The Date First !");
	}
}




function appointmentformSubmit(dataString) {
	var data = dataString
	var url = "ajaxregisterappointment.php?" + data;
	// alert(data);
	loadContent(url, appointmentformSubmitContentHandler)

}


function appointmentformSubmitContentHandler(content) {

	document.getElementById("submitforms").innerHTML = content
	nextbutton();
}