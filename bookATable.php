{% extends "layout.html" %}

{% block nav %}
    {% include 'nav.html' %}
{% endblock %}

{% block content %}

<div id="border-frame">
    <div id="top-section">
      <h2> BOOK A TABLE </h2>
      <p>We are now open for outdoor and indoor dining in our 
        restaurant from 17th May. In order to maintain social distancing,
        any high chairs requested or prams brought with you are classed as
        a seat outside whilst we follow the rule of 6.
      </p> 
    </div>

    <form id="booking-input" method="POST" action="bookATable.php">

      <input type="text" name="name" id="name" placeholder="Name:"></input>
      <div class="validation">{{ validations.nameError }}</div>
      
      <input type="number" name="people" id="people" placeholder="No. of People:"></input>
      <div class="validation">{{ validations.peopleError }}</div>
    
      <input type="date" name="date" id="date" placeholder=""></input> <!-- placeholder = php script to get current date -->
      <div class="validation">{{ validations.dateError }}</div>
      
      <input type="time" name="time" id="time"  placeholder=""></input> <!-- placeholder = php script to get current time -->
      <div class="validation">{{ validations.timeError }}</div>
      
      <input type="email" name="cemail" id="cemail" required placeholder="Email:" value="{{formvalues.email}}" aria-describedby="helpblock" aria-required="true"></input>
      <div class="validation">{{ validations.emailError }}</div>
      
      <input type="text" name="mobile" id="mobile" placeholder="Mob. No:"></input>
      <div class="validation">{{ validations.mobileError }}</div>

    <br>

    <div id="booking-submit">
      
      <div id="checkbox-div">
        <input id="checkbox "type="checkbox" name="checkbox"></input>
        I accept La Nourriture de Fantaisie 
        <a href="templates/privacy.html" target="_blank">Privacy Policy</a>
        <div class="validation">{{ validations.checkboxError }}</div>
      </div>
      <input onsubmit="checkPriv()" type="submit"></input>      
      <br><br>
    </div>

    <div class="validation-message">{{ validations.pagemessage }}</div>
    </form>
</div>

<script src="../assets/js/privacy.js"></script>
{% endblock %}
