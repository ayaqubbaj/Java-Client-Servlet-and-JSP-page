<?php
$ip = "127.0.0.1:161";
$tcpConState=snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.1");
$tcpLocalAddress = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.2");
$tcpLocalPort = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.3");
$tcpConnRemAddress = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.4");
$tcpConnRemPort = snmp2_walk("127.0.0.1", "public", ".1.3.6.1.2.1.6.13.1.5");

print("\n The content of the TCP connection Table: \n");



echo "|index| \t tcpConState| \t tcpLocalAddress| \t tcpLocalPort| \t tcpConnRemAddress \t $tcpConnRemPort[$i] \n  ";

for($i = 0; $i < count($tcpConState); $i++){
 
 echo "$i $tcpConState[$i] \t $tcpLocalAddress[$i] \t  $tcpLocalPort[$i] \t $tcpConnRemAddress[$i] \t $tcpConnRemPort[$i] \n";



}


?>