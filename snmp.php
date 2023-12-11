<?php
 $contact = $_REQUEST["T1"];
 $location = $_REQUEST["T2"];
$ip = "127.0.0.1:161";

echo("Information about System Group :\n");
print("\nSysName: ");
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.5.0"). "\n";
print("\nSysDescr: ");
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.1.0"). "\n";
print("\nSysUpTime: ");
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.3.0"). "\n";
print("\nOID: ");
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.2.0"). "\n";
print("\nSysContact: ");
snmp2_set($ip, "public", ".1.3.6.1.2.1.1.4.0", "s", $contact);
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.4.0"). "\n";

print("\nSysLocation: ");
snmp2_set($ip, "public", ".1.3.6.1.2.1.1.6.0", "s", $location);
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.6.0"). "\n";


?>