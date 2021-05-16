function parameterItems(itemParameter, accreditation_template_id)
{
	event.preventDefault();
	var url =  baseURL + 'parameter-items/get-items/' + itemParameter + '/' + accreditation_template_id;

	$.ajax({
		type: "GET",
		url: url,
		dataType : "HTML",
		success: function(data)
		{
			$('#indicators').html(data);
		},
		error: function(req, status, err)
		{
			alert('Something Went Wrong', status, err);
		},
	});
	return false;
}

function displayMSI(itemParameter, accreditation_template_id)
{
	event.preventDefault();
	var url =  baseURL + 'parameter-items/get-items/' + itemParameter + '/' + accreditation_template_id;

	$.ajax({
		type: "GET",
		url: url,
		dataType : "HTML",
		success: function(data)
		{
			$('#indicators').html(data);

			$('#parameterTable').html(data);
			// $('#indicators-table .tbody').
		},
		error: function(req, status, err)
		{
			alert('Something Went Wrong', status, err);
		},
	});
	return false;
}

function msiTest(itemParameter, accreditation_template_id)
{
	//alert("clicked");
	event.preventDefault();
	var url =  baseURL + 'msi/displayItems/' + itemParameter + '/' + accreditation_template_id;

	$.ajax({
		type: "GET",
		url: url,
		dataType : "HTML",
		success: function(data)
		{
			// $('#indicators').ht	ml(data);

			$('#parameterTable').html(data);
			// $('#indicators-table .tbody').
		},
		error: function(req, status, err)
		{
			alert('Something Went Wrong', status, err);
		},
	});
	return false;
}
//
// function getAllDocuments()
// {
// 	var url = baseURL + 'academic-documents/show-all';
// 	$.ajax({
// 		type: "GET",
// 		url: url,
// 		dataType : "HTML",
// 		success: function(data)
// 		{
// 			$('#docList').html(data);
// 			$('#documentListForTagging').modal('show');
// 		},
// 		error: function(req, status, err)
// 		{
// 			alert('Something Went Wrong', status, err);
// 		},
// 	});
// }
function getAllDocuments(parameter_item_id, accre_id, arrtagged_documents)
{
  $('#documentListForTagging').modal('show');
	$('#academic_document_ids').val(arrtagged_documents).change();
	$('#btnTagging').on('click', function(event){
		event.preventDefault();
		var id = parameter_item_id;
		var accretemplate_id = accre_id;
		var tagged_documents = $('#academic_document_ids').val();
		var url = baseURL + 'parameter-items/tagdocuments';
		$.ajax({
			type: "POST",
			url: url,
			dataType : "JSON",
			data : {id:id , tagged_documents:tagged_documents},
			success: function(data)
			{
					alert("Success in Adding Indecator / Parameter Item.");
					$('#academic_document_ids').select2('val', '');
					$('#documentListForTagging').modal('hide');
          window.location.replace(baseURL + "/accreditation-templates/show/"+accretemplate_id);
      },
			error: function(req, status, err)
			{
				alert('Something Went Wrong', status, err);
		  },
		});
	});
}

$("#submit_parameter_item").on('click', function(event){
		event.preventDefault();
		var base_url = $("#baseurl").val();
		var url = base_url + 'accreditation-templates/add-parameter-item';

		var parameter_item = $('#parameter_item').val();
		var description = $('#description').val();
		var document_needed_list = $('#document_needed_list').val();
		var parameter_section_id = $('#parameter_section_id').val();
		var accreditation_template_id = $('#accreditation_template_id').val();
		var template_parameter_id = $('#template_parameter_id').val();
		var parent_parameter_item_id = $('#parent_parameter_item_id').val();
		$.ajax({
			type: "POST",
			url: url,
			dataType : "JSON",
			data : {parameter_item:parameter_item , description:description, document_needed_list:document_needed_list, parameter_section_id:parameter_section_id, accreditation_template_id:accreditation_template_id, template_parameter_id:template_parameter_id, parent_parameter_item_id:parent_parameter_item_id},
			success: function(data)
			{
					alert("Success in Adding Indecator / Parameter Item.");

					$('#parameter_item').val("");
					$('#description').val("");
					$('#document_needed_list').val("");
					$('#parameter_section_id').val("");
					$('#accreditation_template_id').val("");
					$('#template_parameter_id').val("");
					$('#parent_parameter_item_id').val("");
					$('#frmParameterItems').modal('hide');

          console.log(data);
      },
			error: function(req, status, err)
			{
				alert('Something Went Wrong', status, err);
				// console.log(req);
		  },
		});
		 return false;
	});
