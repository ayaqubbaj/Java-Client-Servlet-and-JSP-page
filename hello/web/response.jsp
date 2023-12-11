<%@ page import="java.util.ArrayList" %>
<%@ page import="org.snmp4j.smi.*" %>
<%@ page import="org.snmp4j.*" %>

<%
ArrayList<String> tcpConnState = new ArrayList<String>();
ArrayList<String> tcpConnLocalAddress = new ArrayList<String>();
ArrayList<String> tcpConnLocalPort = new ArrayList<String>();
ArrayList<String> tcpConnRemAddress = new ArrayList<String>();
ArrayList<String> tcpConnRemPort = new ArrayList<String>();

CommunityTarget target = new CommunityTarget();
target.setCommunity(new OctetString("public"));
target.setAddress(GenericAddress.parse("udp:localhost/161"));
target.setRetries(2);
target.setTimeout(1500);
target.setVersion(SnmpConstants.version2c);

Snmp snmp = new Snmp(new DefaultUdpTransportMapping());
snmp.listen();

OID oidState = new OID("1.3.6.1.2.1.6.13.1.1");
OID oidLocalAddress = new OID("1.3.6.1.2.1.6.13.1.2");
OID oidLocalPort = new OID("1.3.6.1.2.1.6.13.1.3");
OID oidRemAddress = new OID("1.3.6.1.2.1.6.13.1.4");
OID oidRemPort = new OID("1.3.6.1.2.1.6.13.1.5");

TreeUtils treeUtils = new TreeUtils(snmp, new DefaultPDUFactory());
List<TreeEvent> eventsState = treeUtils.getSubtree(target, oidState);
List<TreeEvent> eventsLocalAddress = treeUtils.getSubtree(target, oidLocalAddress);
List<TreeEvent> eventsLocalPort = treeUtils.getSubtree(target, oidLocalPort);
List<TreeEvent> eventsRemAddress = treeUtils.getSubtree(target, oidRemAddress);
List<TreeEvent> eventsRemPort = treeUtils.getSubtree(target, oidRemPort);

for (TreeEvent event : eventsState) {
    if (event != null) {
        VariableBinding[] varBindings = event.getVariableBindings();
        if (varBindings != null) {
            for (VariableBinding varBinding : varBindings) {
                tcpConnState.add(varBinding.getVariable().toString());
            }
        }
    }
}

// Repeat the same process for other variables...

out.println("ConnState\t\t" + "ConnLocalAddress\t\t" + "ConnLocalPort \t\t" + "ConnRemAddress\t\t" + "ConnRemPort <br>");

for (int i = 0; i < tcpConnLocalAddress.size(); i++) {
    out.println(tcpConnState.get(i) + "\t\t" + tcpConnLocalAddress.get(i) + "\t\t" + tcpConnLocalPort.get(i) + "\t\t" + tcpConnRemAddress.get(i) + "\t\t" + tcpConnRemPort.get(i) + "<br>");
}
%>
