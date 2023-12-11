<?php
$ip = "127.0.0.1";
$community = "public";

$udpLocalAddress = snmp2_walk($ip, $community, ".1.3.6.1.2.1.7.5.1.1"); // Retrieve UDP local addresses
$udpLocalPort = snmp2_walk($ip, $community, ".1.3.6.1.2.1.7.5.1.2"); // Retrieve UDP local ports

echo "UDP Local Addresses:\n";
foreach ($udpLocalAddress as $address) {
    echo "$address\n";
}

echo "\nUDP Local Ports:\n";
foreach ($udpLocalPort as $port) {
    echo "$port\n";
}
?>
