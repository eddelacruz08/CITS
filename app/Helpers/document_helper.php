<?php
if (! function_exists('getReactions'))
{
	function getReactions($str_tagged_documents, array $documents)
	{
		$str_tagged_documents = str_replace("[","", $str_tagged_documents);
		$str_tagged_documents = str_replace("]","", $str_tagged_documents);
		$tagged_documents = explode(',',$str_tagged_documents);
		$isFound = 0;

		foreach($tagged_documents as $tagged_document)
		{
			foreach($documents as $document)
			{
					if($tagged_document == $document['id'])
					{
						echo '<li>'.strtoupper($document['name']). '</li>';
						break;
					}
			}
		}
	}
}

if(! function_exists('documentType'))
{
	function documentType($doctypeid)
	{
		$doctypes = $_SESSION['doctypes'];
		foreach($doctypes as $docType)
		{
			if($docType['id'] == $doctypeid)
			{
				return strtoupper($docType['document_type_code']);
			}
		}
	}
}
