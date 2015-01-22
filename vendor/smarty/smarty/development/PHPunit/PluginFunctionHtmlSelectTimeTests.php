<?php
/**
* Smarty PHPunit tests of modifier
* 
* @package PHPunit
* @author Rodney Rehm 
*/

/**
* class for modifier tests
*/
class PluginFunctionHtmlSelectTimeTests extends PHPUnit_Framework_TestCase {
    public function setUp()
    {
        $this->smarty = SmartyTests::$smarty;
        SmartyTests::init();
        
        $this->now = mktime( 16, 15, 11, 2, 20, 2011 );
    } 
    
    public static function isRunnable()
    {
        return true;
    }
    
    protected $now = null;
    protected $hours = array(
        'none' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">23</option>',
        'default' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16" selected="selected">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">23</option>',
        '12h' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04" selected="selected">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>',
        'format_%03d' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">000</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">001</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">002</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">003</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">004</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">005</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">006</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">007</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">008</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">009</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">010</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">011</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">012</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">013</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">014</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">015</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16" selected="selected">016</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">017</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">018</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">019</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">020</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">021</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">022</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">023</option>',
        'format_value_%03d' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="000">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="001">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="002">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="003">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="004">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="005">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="006">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="007">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="008">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="009">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="010">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="011">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="012">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="013">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="014">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="015">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="016" selected="selected">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="017">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="018">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="019">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="020">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="021">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="022">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="023">23</option>',
    );
    protected $minutes = array(
        'none' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">23</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="24">24</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="26">26</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="27">27</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="28">28</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="29">29</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="31">31</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="32">32</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="33">33</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="34">34</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="36">36</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="37">37</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="38">38</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="39">39</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="41">41</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="42">42</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="43">43</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="44">44</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="46">46</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="47">47</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="48">48</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="49">49</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="51">51</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="52">52</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="53">53</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="54">54</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">55</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="56">56</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="57">57</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="58">58</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="59">59</option>',
        'default' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15" selected="selected">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">23</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="24">24</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="26">26</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="27">27</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="28">28</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="29">29</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="31">31</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="32">32</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="33">33</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="34">34</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="36">36</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="37">37</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="38">38</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="39">39</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="41">41</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="42">42</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="43">43</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="44">44</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="46">46</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="47">47</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="48">48</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="49">49</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="51">51</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="52">52</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="53">53</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="54">54</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">55</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="56">56</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="57">57</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="58">58</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="59">59</option>',
        '30' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00" selected="selected">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>',
        '15' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15" selected="selected">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>',
        '10' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10" selected="selected">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>',
        '5' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15" selected="selected">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">55</option>',
        'format_%03d' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">000</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">001</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">002</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">003</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">004</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">005</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">006</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">007</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">008</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">009</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">010</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">011</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">012</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">013</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">014</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15" selected="selected">015</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16">016</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">017</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">018</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">019</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">020</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">021</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">022</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">023</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="24">024</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">025</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="26">026</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="27">027</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="28">028</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="29">029</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">030</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="31">031</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="32">032</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="33">033</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="34">034</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">035</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="36">036</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="37">037</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="38">038</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="39">039</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">040</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="41">041</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="42">042</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="43">043</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="44">044</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">045</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="46">046</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="47">047</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="48">048</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="49">049</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">050</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="51">051</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="52">052</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="53">053</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="54">054</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">055</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="56">056</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="57">057</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="58">058</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="59">059</option>',
        'format_value_%03d' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="000">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="001">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="002">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="003">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="004">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="005">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="006">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="007">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="008">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="009">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="010">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="011">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="012">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="013">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="014">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="015" selected="selected">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="016">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="017">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="018">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="019">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="020">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="021">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="022">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="023">23</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="024">24</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="025">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="026">26</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="027">27</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="028">28</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="029">29</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="030">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="031">31</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="032">32</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="033">33</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="034">34</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="035">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="036">36</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="037">37</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="038">38</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="039">39</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="040">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="041">41</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="042">42</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="043">43</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="044">44</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="045">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="046">46</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="047">47</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="048">48</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="049">49</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="050">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="051">51</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="052">52</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="053">53</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="054">54</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="055">55</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="056">56</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="057">57</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="058">58</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="059">59</option>',
    );
    protected $seconds = array(
        'none' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">23</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="24">24</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="26">26</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="27">27</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="28">28</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="29">29</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="31">31</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="32">32</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="33">33</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="34">34</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="36">36</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="37">37</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="38">38</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="39">39</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="41">41</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="42">42</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="43">43</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="44">44</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="46">46</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="47">47</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="48">48</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="49">49</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="51">51</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="52">52</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="53">53</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="54">54</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">55</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="56">56</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="57">57</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="58">58</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="59">59</option>',
        'default' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11" selected="selected">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">23</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="24">24</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="26">26</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="27">27</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="28">28</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="29">29</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="31">31</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="32">32</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="33">33</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="34">34</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="36">36</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="37">37</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="38">38</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="39">39</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="41">41</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="42">42</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="43">43</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="44">44</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="46">46</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="47">47</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="48">48</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="49">49</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="51">51</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="52">52</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="53">53</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="54">54</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">55</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="56">56</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="57">57</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="58">58</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="59">59</option>',
        '30' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00" selected="selected">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>',
        '15' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00" selected="selected">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>',
        '10' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10" selected="selected">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>',
        '5' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10" selected="selected">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">55</option>',
        'format_%03d' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="00">000</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">001</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">002</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">003</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">004</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">005</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">006</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">007</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">008</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">009</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">010</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11" selected="selected">011</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">012</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="13">013</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="14">014</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">015</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="16">016</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="17">017</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18">018</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="19">019</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="20">020</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21">021</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="22">022</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="23">023</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="24">024</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">025</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="26">026</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="27">027</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="28">028</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="29">029</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="30">030</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="31">031</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="32">032</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="33">033</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="34">034</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="35">035</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="36">036</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="37">037</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="38">038</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="39">039</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="40">040</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="41">041</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="42">042</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="43">043</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="44">044</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="45">045</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="46">046</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="47">047</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="48">048</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="49">049</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">050</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="51">051</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="52">052</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="53">053</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="54">054</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="55">055</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="56">056</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="57">057</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="58">058</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="59">059</option>',
        'format_value_%03d' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="000">00</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="001">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="002">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="003">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="004">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="005">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="006">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="007">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="008">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="009">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="010">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="011" selected="selected">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="012">12</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="013">13</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="014">14</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="015">15</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="016">16</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="017">17</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="018">18</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="019">19</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="020">20</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="021">21</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="022">22</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="023">23</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="024">24</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="025">25</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="026">26</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="027">27</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="028">28</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="029">29</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="030">30</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="031">31</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="032">32</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="033">33</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="034">34</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="035">35</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="036">36</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="037">37</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="038">38</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="039">39</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="040">40</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="041">41</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="042">42</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="043">43</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="044">44</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="045">45</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="046">46</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="047">47</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="048">48</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="049">49</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="050">50</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="051">51</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="052">52</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="053">53</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="054">54</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="055">55</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="056">56</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="057">57</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="058">58</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="059">59</option>',
    );
    protected $meridians = array(
        'default' => '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="am">AM</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="pm" selected="selected">PM</option>',
    );
    
    
    public function testDefault()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .'}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }

    public function testPrefix()
    {
        $n = "\n";
        $result = '<select name="foobar_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="foobar_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="foobar_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' prefix="foobar_"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testFieldArray()
    {
        $n = "\n";
        $result = '<select name="namorized[Time_Hour]">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="namorized[Time_Minute]">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="namorized[Time_Second]">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' field_array="namorized"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));

        $result = '<select name="namorized[foobar_Hour]">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="namorized[foobar_Minute]">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="namorized[foobar_Second]">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' field_array="namorized" prefix="foobar_"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testExtra()
    {
        $n = "\n";
        $result = '<select name="Time_Hour" data-foo="xy">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute" data-foo="xy">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second" data-foo="xy">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' all_extra="data-foo=\"xy\""}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour" data-foo="hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute" data-foo="minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second" data-foo="second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' hour_extra="data-foo=\"hour\"" minute_extra="data-foo=\"minute\"" second_extra="data-foo=\"second\""}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour" data_foo="foo">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute" data_foo="foo">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second" data_foo="foo">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' data_foo="foo"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }

    public function testFieldSeparator()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .' - <select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .' - <select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' field_separator=" - "}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testEmpty()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' all_empty=""}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">all</option>'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">all</option>'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">all</option>'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' all_empty="all"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));

        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' second_empty=""}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">hour</option>'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">minute</option>'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">second</option>'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' hour_empty="hour" minute_empty="minute" second_empty="second"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testEmptyUnset()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->hours['none'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->minutes['none'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->seconds['none'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time=null all_empty=""}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">all</option>'.$n. $this->hours['none'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">all</option>'.$n. $this->minutes['none'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">all</option>'.$n. $this->seconds['none'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time=null all_empty="all"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));

        $result = '<select name="Time_Hour">'.$n. $this->hours['none'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['none'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>'.$n. $this->seconds['none'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time=null second_empty=""}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">hour</option>'.$n. $this->hours['none'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">minute</option>'.$n. $this->minutes['none'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n.'<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">second</option>'.$n. $this->seconds['none'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time=null hour_empty="hour" minute_empty="minute" second_empty="second"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
   
    public function testId()
    {
        $n = "\n";
        $result = '<select name="Time_Hour" id="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute" id="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second" id="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' all_id=""}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));

        $result = '<select name="Time_Hour" id="all-Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute" id="all-Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second" id="all-Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' all_id="all-"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour" id="hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute" id="minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second" id="second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' hour_id="hour" minute_id="minute" second_id="second"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }

    public function testDisplay()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' display_minutes=false display_seconds=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' display_hours=false display_seconds=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' display_hours=false display_minutes=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testMeridian()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['12h'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>'
            .$n.'<select name="Time_Meridian">'.$n. $this->meridians['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' use_24_hours=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['12h'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' use_24_hours=false display_meridian=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $time = mktime( 0, 15, 11, 2, 20, 2011 );
        $result = '<select name="Time_Hour">'.$n. '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12" selected="selected">12</option>
</select>
<select name="Time_Meridian">
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="am" selected="selected">AM</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="pm">PM</option>
</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $time .' use_24_hours=false display_minutes=false display_seconds=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $time = mktime( 4, 15, 11, 2, 20, 2011 );
        $result = '<select name="Time_Hour">'.$n. '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04" selected="selected">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
</select>
<select name="Time_Meridian">
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="am" selected="selected">AM</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="pm">PM</option>
</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $time .' use_24_hours=false display_minutes=false display_seconds=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $time = mktime( 12, 15, 11, 2, 20, 2011 );
        $result = '<select name="Time_Hour">'.$n. '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12" selected="selected">12</option>
</select>
<select name="Time_Meridian">
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="am">AM</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="pm" selected="selected">PM</option>
</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $time .' use_24_hours=false display_minutes=false display_seconds=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $time = mktime( 16, 15, 11, 2, 20, 2011 );
        $result = '<select name="Time_Hour">'.$n. '<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="01">01</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="02">02</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="03">03</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="04" selected="selected">04</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="05">05</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="06">06</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="07">07</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="08">08</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="09">09</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="10">10</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="11">11</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="12">12</option>
</select>
<select name="Time_Meridian">
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="am">AM</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="pm" selected="selected">PM</option>
</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $time .' use_24_hours=false display_minutes=false display_seconds=false}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    
    public function testMinuteInterval()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['30'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' minute_interval=30}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['15'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' minute_interval=15}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['10'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' minute_interval=10}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['5'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' minute_interval=5}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testSecondInterval()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['30'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' second_interval=30}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['15'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' second_interval=15}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['10'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' second_interval=10}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['5'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' second_interval=5}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    

    public function testFormat()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['format_%03d'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' hour_format="%03d"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['format_%03d'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' minute_format="%03d"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['format_%03d'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' second_format="%03d"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }

    public function testValueFormat()
    {
        $n = "\n";
        $result = '<select name="Time_Hour">'.$n. $this->hours['format_value_%03d'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' hour_value_format="%03d"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['format_value_%03d'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['default'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' minute_value_format="%03d"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $result = '<select name="Time_Hour">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="Time_Minute">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="Time_Second">'.$n. $this->seconds['format_value_%03d'] .$n.'</select>';
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time='. $this->now .' second_value_format="%03d"}');
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testTimeArray()
    {
        $n = "\n";
        $result = '<select name="namorized[foobar_Hour]">'.$n. $this->hours['default'] .$n.'</select>'
            .$n.'<select name="namorized[foobar_Minute]">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="namorized[foobar_Second]">'.$n. $this->seconds['default'] .$n.'</select>';
        
        $time_array = array(
            'namorized' => array(
                'foobar_Hour' => '16',
                'foobar_Minute' => '15',
                'foobar_Second' => '11',
            ),
        );
        
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time=$time_array.namorized field_array="namorized" prefix="foobar_"}');
        $tpl->assign('time_array', $time_array);
        $this->assertEquals($result, $this->smarty->fetch($tpl));
        
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time=$time_array field_array="namorized" prefix="foobar_"}');
        $tpl->assign('time_array', $time_array);
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
    
    public function testTimeArrayMerdidian()
    {
        $n = "\n";
        $result = '<select name="namorized[foobar_Hour]">'.$n. $this->hours['12h'] .$n.'</select>'
            .$n.'<select name="namorized[foobar_Minute]">'.$n. $this->minutes['default'] .$n.'</select>'
            .$n.'<select name="namorized[foobar_Second]">'.$n. $this->seconds['default'] .$n.'</select>'
            .$n.'<select name="namorized[foobar_Meridian]">'.$n. $this->meridians['default'] .$n.'</select>';
        
        $time_array = array(
            'namorized' => array(
                'foobar_Hour' => '04',
                'foobar_Minute' => '15',
                'foobar_Second' => '11',
                'foobar_Meridian' => 'pm',
            ),
        );
        
        $tpl = $this->smarty->createTemplate('eval:{html_select_time time=$time_array use_24_hours=false field_array="namorized" prefix="foobar_"}');
        $tpl->assign('time_array', $time_array);
        $this->assertEquals($result, $this->smarty->fetch($tpl));
    }
} 

?>