Ext.data.JsonP.Pivot({"tagname":"class","name":"Pivot","autodetected":{},"files":[{"filename":"pivot.js","href":"pivot.html#Pivot"}],"docauthor":[{"tagname":"docauthor","name":"Jonathan Jackson","email":null}],"members":[{"name":"addFieldValue","tagname":"method","owner":"Pivot","id":"method-addFieldValue","meta":{}},{"name":"appendDisplayField","tagname":"method","owner":"Pivot","id":"method-appendDisplayField","meta":{"private":true}},{"name":"appendField","tagname":"method","owner":"Pivot","id":"method-appendField","meta":{}},{"name":"appendFilter","tagname":"method","owner":"Pivot","id":"method-appendFilter","meta":{}},{"name":"applyFilter","tagname":"method","owner":"Pivot","id":"method-applyFilter","meta":{}},{"name":"castFieldValue","tagname":"method","owner":"Pivot","id":"method-castFieldValue","meta":{}},{"name":"config","tagname":"method","owner":"Pivot","id":"method-config","meta":{}},{"name":"defaultSummarizeFunctionAvg","tagname":"method","owner":"Pivot","id":"method-defaultSummarizeFunctionAvg","meta":{}},{"name":"defaultSummarizeFunctionCount","tagname":"method","owner":"Pivot","id":"method-defaultSummarizeFunctionCount","meta":{}},{"name":"defaultSummarizeFunctionSum","tagname":"method","owner":"Pivot","id":"method-defaultSummarizeFunctionSum","meta":{}},{"name":"displayFieldValue","tagname":"method","owner":"Pivot","id":"method-displayFieldValue","meta":{}},{"name":"getField","tagname":"method","owner":"Pivot","id":"method-getField","meta":{}},{"name":"getFields","tagname":"method","owner":"Pivot","id":"method-getFields","meta":{}},{"name":"getFilters","tagname":"method","owner":"Pivot","id":"method-getFilters","meta":{}},{"name":"init","tagname":"method","owner":"Pivot","id":"method-init","meta":{}},{"name":"pivotData","tagname":"method","owner":"Pivot","id":"method-pivotData","meta":{}},{"name":"pivotDisplay","tagname":"method","owner":"Pivot","id":"method-pivotDisplay","meta":{}},{"name":"pivotDisplayAll","tagname":"method","owner":"Pivot","id":"method-pivotDisplayAll","meta":{}},{"name":"pivotDisplayColumnLabels","tagname":"method","owner":"Pivot","id":"method-pivotDisplayColumnLabels","meta":{}},{"name":"pivotDisplayRowLabels","tagname":"method","owner":"Pivot","id":"method-pivotDisplayRowLabels","meta":{}},{"name":"pivotDisplaySummaries","tagname":"method","owner":"Pivot","id":"method-pivotDisplaySummaries","meta":{}},{"name":"pivotFields","tagname":"method","owner":"Pivot","id":"method-pivotFields","meta":{}},{"name":"pivotFilters","tagname":"method","owner":"Pivot","id":"method-pivotFilters","meta":{}},{"name":"pivotResults","tagname":"method","owner":"Pivot","id":"method-pivotResults","meta":{}},{"name":"reset","tagname":"method","owner":"Pivot","id":"method-reset","meta":{}},{"name":"restrictFields","tagname":"method","owner":"Pivot","id":"method-restrictFields","meta":{}},{"name":"setColumnLabelDisplayFields","tagname":"method","owner":"Pivot","id":"method-setColumnLabelDisplayFields","meta":{}},{"name":"setDisplayFields","tagname":"method","owner":"Pivot","id":"method-setDisplayFields","meta":{"private":true}},{"name":"setFields","tagname":"method","owner":"Pivot","id":"method-setFields","meta":{}},{"name":"setFilters","tagname":"method","owner":"Pivot","id":"method-setFilters","meta":{}},{"name":"setRowLabelDisplayFields","tagname":"method","owner":"Pivot","id":"method-setRowLabelDisplayFields","meta":{}},{"name":"setSummaryDisplayFields","tagname":"method","owner":"Pivot","id":"method-setSummaryDisplayFields","meta":{}},{"name":"token","tagname":"method","owner":"Pivot","id":"method-token","meta":{"private":true}}],"alternateClassNames":[],"aliases":{},"id":"class-Pivot","short_doc":"Welcome to Pivot.js\n\nPivot.js is a simple way for you to get to your data. ...","component":false,"superclasses":[],"subclasses":[],"mixedInto":[],"mixins":[],"parentMixins":[],"requires":[],"uses":[],"html":"<div><pre class=\"hierarchy\"><h4>Files</h4><div class='dependency'><a href='source/pivot.html#Pivot' target='_blank'>pivot.js</a></div></pre><div class='doc-contents'><h1>Welcome to Pivot.js</h1>\n\n<p>Pivot.js is a simple way for you to get to your data.  It allows for the\ncreation of highly customizable unique table views from your browser.</p>\n\n<blockquote><p>In data processing, a pivot table is a data summarization tool found in\ndata visualization programs such as spreadsheets or business intelligence\nsoftware. Among other functions, pivot-table tools can automatically sort,\ncount, total or give the average of the data stored in one table or\nspreadsheet. It displays the results in a second table (called a \"pivot\ntable\") showing the summarized data.</p></blockquote>\n\n<p>In our case, results (or the pivot-table) will be displayed as an HTML table\npivoting from the input data (CSV or JSON). Without further ado let's get to usage.</p>\n\n<p>View an <a href=\"http://rjackson.github.com/pivot.js/\">example</a>.</p>\n\n<h1>Usage</h1>\n\n<p>Step one is to initialize the pivot object.  It expects the following attributes:</p>\n\n<ul>\n<li><p><code>csv</code> - which should contain a valid string of comma separated values.  It is\n<strong>important to note</strong> that you must include a header row in the CSV for pivot\nto work properly  (you'll understand why in a minute).</p></li>\n<li><p><code>json</code> - which should contain a valid JSON string. At this time this string\nmust be an array of arrays, and not an array of objects (storing the field\nnames with each row consumes significantly more space).</p></li>\n<li><p><code>fields</code> - which should be an array of objects.  This is used to instruct\npivot on how to interact with the fields you pass in.  It keys off of the\nheader row names.  And is formated like so:</p>\n\n<p>  [ {name: 'header-name', type: 'string', optional_attributes: 'optional field' },\n  {name: 'header-name', type: 'string', optional_attributes: 'optional field' }]</p></li>\n<li><p><code>filters</code> (default is empty) - which should contain any filters you would like to restrict your data to.  A filter is defined as an object like so:</p>\n\n<p>  {zip_code: '34471'}</p></li>\n</ul>\n\n\n<p>Those are the options that you should consider.  There are other options that are well covered in the spec\nA valid pivot could then be set up from like so.</p>\n\n<pre><code>var field_definitions = [{name: 'last_name',   type: 'string',   filterable: true},\n        {name: 'first_name',        type: 'string',   filterable: true},\n        {name: 'zip_code',          type: 'integer',  filterable: true},\n        {name: 'pseudo_zip',        type: 'integer',  filterable: true },\n        {name: 'billed_amount',     type: 'float',    rowLabelable: false,},\n        {name: 'last_billed_date',  type: 'date',     filterable: true}\n\n// from csv data:\nvar csv_string  =  \"last_name,first_name,zip_code,billed_amount,last_billed_date\\n\" +\n                   \"Jackson,Robert,34471,100.00,\\\"Tue, 24 Jan 2012 00:00:00 +0000\\\"\\n\" +\n                   \"Jackson,Jonathan,39401,124.63,\\\"Fri, 17 Feb 2012 00:00:00 +0000\\\"\"\npivot.init({csv: csv_string, fields: field_definitions});\n\n// from json data:\nvar json_string = '[[\"last_name\",\"first_name\",\"zip_code\",\"billed_amount\",\"last_billed_date\"],' +\n                    ' [\"Jackson\", \"Robert\", 34471, 100.00, \"Tue, 24 Jan 2012 00:00:00 +0000\"],' +\n                    ' [\"Smith\", \"Jon\", 34471, 173.20, \"Mon, 13 Feb 2012 00:00:00 +0000\"]]'\n\npivot.init({json: json_string, fields: field_definitions});\n</code></pre>\n</div><div class='members'><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-method'>Methods</h3><div class='subsection'><div id='method-addFieldValue' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-addFieldValue' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-addFieldValue' class='name expandable'>addFieldValue</a>( <span class='pre'>field, value</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Adds value to field based off of the Fields' displayFunction, defaults to count. ...</div><div class='long'><p>Adds value to field based off of the Fields' displayFunction, defaults to count.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>field</span> : Object<div class='sub-desc'></div></li><li><span class='pre'>value</span> : Object<div class='sub-desc'></div></li></ul></div></div></div><div id='method-appendDisplayField' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-appendDisplayField' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-appendDisplayField' class='name expandable'>appendDisplayField</a>( <span class='pre'>string, string</span> ) : undefined<span class=\"signature\"><span class='private' >private</span></span></div><div class='description'><div class='short'>This method allows you to append a new label field to the specified type. ...</div><div class='long'><p>This method allows you to append a new label field to the specified type. For example, you could set a new displayRowLabel by sending it as the type and 'city' as the field</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>string</span> : Object<div class='sub-desc'><p>type - must be either 'rowLabels', 'columnLabels', or 'summaries'</p>\n</div></li><li><span class='pre'>string</span> : Object<div class='sub-desc'><p>field - Specify the label you would like to add.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>undefined</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-appendField' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-appendField' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-appendField' class='name expandable'>appendField</a>( <span class='pre'>field</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>The main engine by which you create and assign field. ...</div><div class='long'><p>The main engine by which you create and assign field.  Takes an object that should look something like {name: 'last_name',type: 'string', filterable: true}, and assigns all the associated attributes to their correct state.\nAllowed field attributes are\n* filterable - Allows you to filter based off this field\n* rowLabelable - Allows you to display rowLabels based off this field\n* columnLabelable - Allows you to display columnLabels based off this field\n* summarizable - Allows you to create a summary field.\n* pseudo - Allows you to treat an anonymous function as a field (ie you could treat the sum of a set of values as a field)\n* sortFunction - Allows you to override the default sort function for columnLabelable fields.\n* displayFunction - Allows you to override the default display function. Using this function you can completely customize the way a field is displayed without having to modify the internal storage.\nBe sure to run through the source on this one if you are unsure as to what it does.  It's pretty straightforward, but definitely bears looking into.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>field</span> : Object<div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-appendFilter' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-appendFilter' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-appendFilter' class='name expandable'>appendFilter</a>( <span class='pre'>newRestriction</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Takes a new restrction (filter) and appends it to current pivot's filters ...</div><div class='long'><p>Takes a new restrction (filter) and appends it to current pivot's filters</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>newRestriction</span> : Object<div class='sub-desc'><p>should looke like {\"last_name\":\"Jackson\"}</p>\n</div></li></ul></div></div></div><div id='method-applyFilter' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-applyFilter' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-applyFilter' class='name expandable'>applyFilter</a>( <span class='pre'>restrictions</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Applies the current pivot's filters to the data returning a list of values\nOptionally allows you to set filters and a...</div><div class='long'><p>Applies the current pivot's filters to the data returning a list of values\nOptionally allows you to set filters and apply them.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>restrictions</span> : Object<div class='sub-desc'><p>allows you to pass the filters to apply without using set first.</p>\n</div></li></ul></div></div></div><div id='method-castFieldValue' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-castFieldValue' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-castFieldValue' class='name expandable'>castFieldValue</a>( <span class='pre'>fieldName, value</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Used to change the string value as parsed from the CSV into the type of field it expects. ...</div><div class='long'><p>Used to change the string value as parsed from the CSV into the type of field it expects.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>fieldName</span> : Object<div class='sub-desc'></div></li><li><span class='pre'>value</span> : Object<div class='sub-desc'></div></li></ul></div></div></div><div id='method-config' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-config' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-config' class='name expandable'>config</a>( <span class='pre'>showFields</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Very cool little function. ...</div><div class='long'><p>Very cool little function. If called like so: <code>pivot.config(true)</code> will return the exact object you would need\nto create the current pivot from scratch.  If passed with no argument will return everything except fields.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>showFields</span> : Object<div class='sub-desc'></div></li></ul></div></div></div><div id='method-defaultSummarizeFunctionAvg' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-defaultSummarizeFunctionAvg' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-defaultSummarizeFunctionAvg' class='name expandable'>defaultSummarizeFunctionAvg</a>( <span class='pre'>rows, field</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns Average of values passed in from rows ...</div><div class='long'><p>Returns Average of values passed in from rows</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>rows</span> : Object<div class='sub-desc'></div></li><li><span class='pre'>field</span> : Object<div class='sub-desc'></div></li></ul></div></div></div><div id='method-defaultSummarizeFunctionCount' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-defaultSummarizeFunctionCount' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-defaultSummarizeFunctionCount' class='name expandable'>defaultSummarizeFunctionCount</a>( <span class='pre'>rows, field</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns count of rows ...</div><div class='long'><p>Returns count of rows</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>rows</span> : Object<div class='sub-desc'></div></li><li><span class='pre'>field</span> : Object<div class='sub-desc'></div></li></ul></div></div></div><div id='method-defaultSummarizeFunctionSum' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-defaultSummarizeFunctionSum' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-defaultSummarizeFunctionSum' class='name expandable'>defaultSummarizeFunctionSum</a>( <span class='pre'>rows, field</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns the sum value of all rows passed to it. ...</div><div class='long'><p>Returns the sum value of all rows passed to it.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>rows</span> : Object<div class='sub-desc'></div></li><li><span class='pre'>field</span> : Object<div class='sub-desc'></div></li></ul></div></div></div><div id='method-displayFieldValue' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-displayFieldValue' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-displayFieldValue' class='name expandable'>displayFieldValue</a>( <span class='pre'>value, fieldName</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Helper for displaying properly formated field values. ...</div><div class='long'><p>Helper for displaying properly formated field values.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>value</span> : Object<div class='sub-desc'></div></li><li><span class='pre'>fieldName</span> : Object<div class='sub-desc'></div></li></ul></div></div></div><div id='method-getField' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-getField' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-getField' class='name expandable'>getField</a>( <span class='pre'>Something</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Attr reader for fields ...</div><div class='long'><p>Attr reader for fields</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>Something</span> : String<div class='sub-desc'><p>like 'last_name'</p>\n</div></li></ul></div></div></div><div id='method-getFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-getFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-getFields' class='name expandable'>getFields</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns array of defined field objects. ...</div><div class='long'><p>Returns array of defined field objects.</p>\n</div></div></div><div id='method-getFilters' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-getFilters' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-getFilters' class='name expandable'>getFilters</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns current pivot's filters ...</div><div class='long'><p>Returns current pivot's filters</p>\n</div></div></div><div id='method-init' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-init' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-init' class='name expandable'>init</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Initializes a new pivot. ...</div><div class='long'><p>Initializes a new pivot.\nOptional parameters:\n* fields\n* filters\n* rowLabels\n* columnLabels\n* summaries</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'></span> : Object<div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-pivotData' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotData' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotData' class='name expandable'>pivotData</a>( <span class='pre'>string</span> ) : Object<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns object containing the raw fields(rawData) and filtered fields(data). ...</div><div class='long'><p>Returns object containing the raw fields(rawData) and filtered fields(data).</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>string</span> : Object<div class='sub-desc'><p>, either 'raw', or 'all'.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>Object</span><div class='sub-desc'><p>An object containing lists of fields</p>\n</div></li></ul></div></div></div><div id='method-pivotDisplay' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotDisplay' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotDisplay' class='name expandable'>pivotDisplay</a>( <span class='pre'></span> ) : function<span class=\"signature\"></span></div><div class='description'><div class='short'>Entry point for several display methods. ...</div><div class='long'><p>Entry point for several display methods.  See pivot.pivotDisplayAll, pivot.pivotDisplayRowLabels, pivot.pivotDisplaycolumnLabels, and pivot.pivotDisplaySummaries</p>\n<h3 class='pa'>Returns</h3><ul><li><span class='pre'>function</span><div class='sub-desc'><p>One of the fucntions defined above.</p>\n</div></li></ul></div></div></div><div id='method-pivotDisplayAll' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotDisplayAll' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotDisplayAll' class='name expandable'>pivotDisplayAll</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>This will return an object containing rowLabels, summaries, and columnLabels that are currently applied to the pivot. ...</div><div class='long'><p>This will return an object containing rowLabels, summaries, and columnLabels that are currently applied to the pivot.</p>\n</div></div></div><div id='method-pivotDisplayColumnLabels' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotDisplayColumnLabels' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotDisplayColumnLabels' class='name expandable'>pivotDisplayColumnLabels</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns either list of columnLabels or allows you to access the pivot.setColumnLabelDisplayFields. ...</div><div class='long'><p>Returns either list of columnLabels or allows you to access the pivot.setColumnLabelDisplayFields.</p>\n\n<p>Called from pivot like so: pivot.display().columnLabels().set() or pivot.display().columnLabels().get</p>\n</div></div></div><div id='method-pivotDisplayRowLabels' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotDisplayRowLabels' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotDisplayRowLabels' class='name expandable'>pivotDisplayRowLabels</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns either list of rowLabels or allows you to access the pivot.setRowLabelDisplayFields. ...</div><div class='long'><p>Returns either list of rowLabels or allows you to access the pivot.setRowLabelDisplayFields.</p>\n\n<p>Called from pivot like so: pivot.display().rowLabels().set() or pivot.display().rowLabels().get</p>\n</div></div></div><div id='method-pivotDisplaySummaries' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotDisplaySummaries' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotDisplaySummaries' class='name expandable'>pivotDisplaySummaries</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns either list of summaries (labels) or allows you to access the pivot.setSummaryDisplayFields. ...</div><div class='long'><p>Returns either list of summaries (labels) or allows you to access the pivot.setSummaryDisplayFields.</p>\n\n<p>Called from pivot like so: pivot.display().summaries().set() or pivot.display().summaries().get</p>\n</div></div></div><div id='method-pivotFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotFields' class='name expandable'>pivotFields</a>( <span class='pre'></span> ) : function<span class=\"signature\"></span></div><div class='description'><div class='short'>Entry point for several field methods. ...</div><div class='long'><p>Entry point for several field methods.\nSee:</p>\n\n<ul>\n<li>restrictFields()</li>\n<li>cloneFields()</li>\n<li>appendField()</li>\n<li>getFields()</li>\n<li>getField()</li>\n<li>setField()</li>\n</ul>\n\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'></span> : String<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>function</span><div class='sub-desc'><p>One of the fucntions defined above.</p>\n</div></li></ul></div></div></div><div id='method-pivotFilters' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotFilters' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotFilters' class='name expandable'>pivotFilters</a>( <span class='pre'></span> ) : function<span class=\"signature\"></span></div><div class='description'><div class='short'>Entry point for several filter methods. ...</div><div class='long'><p>Entry point for several filter methods.\nSee:</p>\n\n<ul>\n<li>getFilters() - returns filters applied to current pivot</li>\n<li>setFilters() - sets a series of filters</li>\n<li>appendFilter() - adds a filter to current pivot filters</li>\n<li>applyFilter() - runs the filters on the values</li>\n</ul>\n\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'></span> : String<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>function</span><div class='sub-desc'><p>One of the fucntions defined above.</p>\n</div></li></ul></div></div></div><div id='method-pivotResults' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-pivotResults' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-pivotResults' class='name expandable'>pivotResults</a>( <span class='pre'></span> ) : function<span class=\"signature\"></span></div><div class='description'><div class='short'>Entry point for several results methods. ...</div><div class='long'><p>Entry point for several results methods.\nSee:</p>\n\n<ul>\n<li>getDataResults() - returns filters applied to current pivot</li>\n<li>getColumnResults() - sets a series of filters</li>\n</ul>\n\n<h3 class='pa'>Returns</h3><ul><li><span class='pre'>function</span><div class='sub-desc'><p>One of the fucntions defined above.</p>\n</div></li></ul></div></div></div><div id='method-reset' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-reset' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-reset' class='name expandable'>reset</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Calls init with no options, which effectively resets the current pivot. ...</div><div class='long'><p>Calls init with no options, which effectively resets the current pivot.</p>\n</div></div></div><div id='method-restrictFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-restrictFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-restrictFields' class='name expandable'>restrictFields</a>( <span class='pre'></span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Returns list of defined fields filtered by type ...</div><div class='long'><p>Returns list of defined fields filtered by type</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'></span> : String<div class='sub-desc'><p>'columnLabelable', 'rowLabelable', 'summarizable', 'filterable', or 'pseudo'</p>\n</div></li></ul></div></div></div><div id='method-setColumnLabelDisplayFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-setColumnLabelDisplayFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-setColumnLabelDisplayFields' class='name expandable'>setColumnLabelDisplayFields</a>( <span class='pre'>listing</span> ) : undefined<span class=\"signature\"></span></div><div class='description'><div class='short'>Allows setting of column label fields ...</div><div class='long'><p>Allows setting of column label fields</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>listing</span> : Object<div class='sub-desc'><ul>\n<li>Should look like ['city','state']</li>\n</ul>\n\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>undefined</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-setDisplayFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-setDisplayFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-setDisplayFields' class='name expandable'>setDisplayFields</a>( <span class='pre'>type, listing</span> ) : undefined<span class=\"signature\"><span class='private' >private</span></span></div><div class='description'><div class='short'>This method simply calls appendDisplayField on a collection passing in each to appendDisplayField. ...</div><div class='long'><p>This method simply calls appendDisplayField on a collection passing in each to appendDisplayField.  The object should look something like the following\n   {'rowLabels':['city','state'],'columnLabels':['billed_amount']}</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>type</span> : Object<div class='sub-desc'></div></li><li><span class='pre'>listing</span> : Object<div class='sub-desc'></div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>undefined</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-setFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-setFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-setFields' class='name expandable'>setFields</a>( <span class='pre'></span> ) : undefined<span class=\"signature\"></span></div><div class='description'><div class='short'>Method for setting multiple fields. ...</div><div class='long'><p>Method for setting multiple fields.  Usually used on pivot.init().\nSee pivot.appendField for more information.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'></span> : Object<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>undefined</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-setFilters' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-setFilters' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-setFilters' class='name expandable'>setFilters</a>( <span class='pre'>restrictions</span> )<span class=\"signature\"></span></div><div class='description'><div class='short'>Accepts list of restrictions, assigns them  as current pivot's filters and casts their values. ...</div><div class='long'><p>Accepts list of restrictions, assigns them  as current pivot's filters and casts their values.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>restrictions</span> : Object<div class='sub-desc'><ul>\n<li>should looke something like {\"employer\":\"Acme Corp\"}</li>\n</ul>\n\n</div></li></ul></div></div></div><div id='method-setRowLabelDisplayFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-setRowLabelDisplayFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-setRowLabelDisplayFields' class='name expandable'>setRowLabelDisplayFields</a>( <span class='pre'>listing</span> ) : undefined<span class=\"signature\"></span></div><div class='description'><div class='short'>Allows setting of row label fields ...</div><div class='long'><p>Allows setting of row label fields</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>listing</span> : Object<div class='sub-desc'><p>Should look like ['city','state']</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>undefined</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-setSummaryDisplayFields' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-setSummaryDisplayFields' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-setSummaryDisplayFields' class='name expandable'>setSummaryDisplayFields</a>( <span class='pre'>listing</span> ) : undefined<span class=\"signature\"></span></div><div class='description'><div class='short'>Allows setting of summary label fields ...</div><div class='long'><p>Allows setting of summary label fields</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>listing</span> : Object<div class='sub-desc'><ul>\n<li>Should look like ['billed_amount']</li>\n</ul>\n\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>undefined</span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-token' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='Pivot'>Pivot</span><br/><a href='source/pivot.html#Pivot-method-token' target='_blank' class='view-source'>view source</a></div><a href='#!/api/Pivot-method-token' class='name expandable'>token</a>( <span class='pre'></span> )<span class=\"signature\"><span class='private' >private</span></span></div><div class='description'><div class='short'>Returns the next token. ...</div><div class='long'><p>Returns the next token.</p>\n</div></div></div></div></div></div></div>","meta":{}});