<?php

$sent = mail('mmamalek@student.wethinkcode.co.za', 'Aloha my happy westcoat friend', 'Hi\n');

if (!$sent)
	echo "something went wrong";
	else
	echo $sent;