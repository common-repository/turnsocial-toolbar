<?php if ($settings_saved) { ?>
  <div class="updated"><p><strong>Settings Saved</strong></p></div>
<?php } ?>

<h1>TurnSocial Toolbar Plugin Configuration</h1>

<h3>Enter your toolbar's key here:</h3>

<form name="form1" method="post" action="">
  <input type="text" name="turnsocial_key" value="<?php echo get_option('turnsocial_key'); ?>" size="50">
  <input type="submit" name="Submit" class="button-primary" value="Save" />
</form>

<h2>Instructions:</h2>

<div>
  <h3>What is my TurnSocial key?</h3>
  Your key is a unique 32 letter and number code to identify your toolbar. 
</div>

<div>
  <h3>Where do I find my key?</h3>
  <div>
    The easiest way to find it is to look at the script tag you are given when 
    you successfully create a toolbar.
  </div>

  <div>
    Here is an example script tag:
  </div>

  <div class="ts_pastebox">
    &lt;script type=&quot;text/javascript&quot; 
    src=&quot;http://turnsocial.com/bar/<b>46626b7401300bbae5525c4ef1acff85</b>.js&quot;&gt;
    &lt;/script&gt;
  </div>

  <div>
    The key is the part highlighted in bold. In this case, it's 
    '46626b7401300bbae5525c4ef1acff85'.
  </div>

  <div>
    To find your script tag, go to 
    <a href="http://turnsocial.com/clients">your toolbar listing page</a>, 
    and click 'show installation code' on the toolbar you want to display.
  </div>
</div>

<div>
 <h3>Having trouble?</h3>
  Email us! <a href="mailto:info@turnsocial.com">info@turnsocial.com</a>
</div>
