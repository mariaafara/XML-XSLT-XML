<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
    <head>
     
        <style type="text/css">
        #meeting {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #meeting td, #meeting th {
          border: 0px solid #ddd;
          padding: 8px;
          width: 50px; 
        }
        #meeting th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
        }


        #meeting tr:nth-child(even){
        background-color: #f2f2f2;
        }

        #meeting tr:hover {background-color: #ddd;}

       
      </style>
    </head>
  <body>
   <xsl:apply-templates select="meetings/meeting"/> 
  </body>
  </html>
</xsl:template>


  <xsl:template match="meeting">
    <table id="meeting">
  <tr>
    <th colspan="2" style="text-align:center"> 
      <xsl:apply-templates select="title"/>
    </th>
    <th>
      <xsl:apply-templates select="date"/>
    </th>
  </tr>
   <xsl:apply-templates select="points"/>
   <xsl:apply-templates select="attendance"/>
   <xsl:apply-templates select="comments"/>
   </table>
   <br/>
   <br/>
   <br/>
  </xsl:template>


<xsl:template match="title">
  <span style="font-family:Bold">  Title: <xsl:value-of select="."/>   </span>
  <!-- Title: <span style="font-family:Bold">  <xsl:value-of select="."/> </span> -->
</xsl:template>

<xsl:template match="date">
  
    <span style="text-align:left"> <xsl:value-of select="."/> </span>
</xsl:template>


<xsl:template match="points">
  <tr><td><span>Main Points:</span></td>
   <td colspan="2">  <ul><xsl:apply-templates select="point"/> </ul></td>
  </tr>
</xsl:template>

<xsl:template match="point">
 
   <li> <xsl:value-of select="."/></li>
  
</xsl:template>

<xsl:template match="attendance">
  <tr><td><span>Attendee:</span></td>
   <td colspan="2">  <ul><xsl:apply-templates select="attendee"/> </ul></td>
  </tr>
</xsl:template>

<xsl:template match="attendee">
 
   <li> <xsl:value-of select="."/></li>
  
</xsl:template>

<xsl:template match="comments">
  <tr><td><span>Additional comments:</span></td>
   <td colspan="2"> <xsl:value-of select="."/></td>
  </tr>
</xsl:template>




</xsl:stylesheet>