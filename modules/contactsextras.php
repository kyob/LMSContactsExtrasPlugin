<?php

function getDuplicateContacts()
{
  $db = LMSDB::getInstance();

  $query = "SELECT cc.customerid, cc.name AS contact_name, cc.contact,
              cv.deleted, cv.lastname, cv.name
            FROM customercontacts cc
            LEFT JOIN customerview cv
            ON cc.customerid = cv.id
            WHERE cc.contact 
            IN (SELECT contact 
                FROM customercontacts 
                GROUP BY contact 
                HAVING count(*) > 1
               ) 
            ORDER BY cc.contact";

  $contacts = $db->GetAll($query);

  return $contacts;
}

$SMARTY->assign('contacts', getDuplicateContacts());
$SMARTY->display('contactsextras.html');
