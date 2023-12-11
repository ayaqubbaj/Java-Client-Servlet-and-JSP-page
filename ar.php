
<?php

$ip = "127.0.0.1";
$community = "public";

echo("Information about ARP Table:\n");

$ipNetToMediaIfIndex = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.1"); // ARP Interface Index
$ipNetToMediaPhysAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2"); // ARP Physical Address (MAC)
$ipNetToMediaNetAddress = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3"); // ARP Network Address (IP)
$ipNetToMediaType = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4"); // ARP Type

// Display ARP Table Information
echo "\nARP Interface Index:\n";
foreach ($ipNetToMediaIfIndex as $ifIndex) {
    echo "$ifIndex\n";
}

echo "\nARP Physical Address (MAC):\n";
foreach ($ipNetToMediaPhysAddress as $physAddress) {
    echo "$physAddress\n";
}

echo "\nARP Network Address (IP):\n";
foreach ($ipNetToMediaNetAddress as $netAddress) {
    echo "$netAddress\n";
}

echo "\nARP Type:\n";
foreach ($ipNetToMediaType as $type) {
    echo "$type\n";
}
?>
