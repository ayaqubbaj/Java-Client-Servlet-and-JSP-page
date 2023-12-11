<%-- 
    Document   : response2
    Created on : Feb 23, 2018, 2:12:05 PM
    Author     : raed
--%>
<jsp:useBean id="mybean" scope="session" class="org.mypackage.hello.NameHandler" />
<jsp:setProperty name="mybean" property="name"  />
<jsp:getProperty name="mybean" property="name" />
