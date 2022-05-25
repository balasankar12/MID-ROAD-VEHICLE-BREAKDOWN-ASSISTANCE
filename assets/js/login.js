$('.form').find('input, textarea').on('keyup blur focus', function (e) {

    var $this = $(this),
        label = $this.prev('label');

    if (e.type === 'keyup') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.removeClass('highlight');
        }
    } else if (e.type === 'focus') {

        if ($this.val() === '') {
            label.removeClass('highlight');
        }
        else if ($this.val() !== '') {
            label.addClass('highlight');
        }
    }

});

$('.tab a').on('click', function (e) {

    e.preventDefault();

    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);

});

$('.hsmessage a').click(function(){
    $('.login').animate({height: "toggle", opacity: "toggle"}, "slow");    
  });
$('.usermessage a').click(function(){
    $('.login').animate({height: "toggle", opacity: "toggle"}, "slow");    
  });

  var ucheck = function() {
    if (document.getElementById('upassword').value == 
    document.getElementById('uconfirmpassword').value) {
      document.getElementById('umessage').style.color = '#ffd584';
      document.getElementById('umessage').innerHTML = 'Matching';
      document.getElementById("uButton").disabled = false;
    } else {
      document.getElementById('umessage').style.color = 'red';
      document.getElementById('umessage').innerHTML = 'Not Matching';
      document.getElementById("uButton").disabled = true;
    }
  };

  var hscheck = function() {
    if (document.getElementById('hspassword').value ==
      document.getElementById('hsconfirmpassword').value ) {
      document.getElementById('hsmessage').style.color = '#4a8bcf';
      document.getElementById('hsmessage').innerHTML = 'Matching';
      document.getElementById("hsButton").disabled = false;
    } else {
      document.getElementById('hsmessage').style.color = 'red';
      document.getElementById('hsmessage').innerHTML = 'Not Matching';
      document.getElementById("hsButton").disabled = true;
    }
  };