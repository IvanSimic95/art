<script type="text/javascript">
var fs = require('fs');
const options = {
  method: "POST",
  url: "https://api.talkjs.com/v1/ArJWsup2/conversations/files",
  // port: 443,
  headers: {
      'Authorization': 'Bearer sk_live_Ncow50B9RdRQFeXBsW45c5LFRVYLCm98',
      "Content-Type": "multipart/form-data"
  },
  formData : {
      "image" : fs.createReadStream("/assets/mail/delivery-images/57729-60.jpg")
  }
};

request(options, function (err, res, body) {
  if(err) console.log(err);
  console.log(body);
});
</script>
