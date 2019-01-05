<?php $configvars = Array(
		"config"=>"/System/Library/OpenSSL/openssl.cnf",
		"private_key_type" => OPENSSL_KEYTYPE_RSA,
		"private_key_bits"=>2048
	);
	// generate asymmetric keys
	$privKey = "";
	$res = openssl_pkey_new($configvars);
	/* Extract the private key from $res to $privKey */
	openssl_pkey_export($res, $privKey,NULL,$configvars);
	/* Extract the public key from $res to $pubKey */
	$pubKey = openssl_pkey_get_details($res);
	$pubKey = $pubKey["key"];
	print_r($privKey);
	echo "priv=".$privKey."<br/>";
	echo "publ=".$pubKey."<br/>";
	// save public key in $db
	// download private key
?>
