<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <title>New Contact</title>
</head>

<body style="margin:0px; padding:0px;background: #f9fdff;">
  <table cellpadding="0" style="margin:20px auto;padding:0;border: none;border-collapse: collapse; font-family: arial; width:600px;">
    
    <tr>
        <td>
            <table cellpadding="5" style="background: #fff; border: none;font-family: arial; width: 100%; text-align: left;">

                <tr>
                    <td><h3 style="color:#000;padding:0;margin:0;font-family: arial; width: 100%;font-weight: 400">Hi Admin, </h3></td>
                </tr>
                
                <tr>
                <tr>
                    <td>
                      <div class="card">
                        <table cellpadding="0" style="background: #fff; border: none;font-family: arial; width: 100%; text-align: left;height: 1px">
                          <tbody style="margin-top: 20px;
                          line-height: 19px;">
                            <tr>
                                <th>Name: </th>
                                <td>{{$customer_name}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{$customer_email}}</td>
                            </tr>
                            <tr>
                                <th>Phone Number: </th>
                                <td>{{$customer_phone_no}}</td>
                            </tr>
                            <tr>
                                <th>Message: </th>
                                <td>{{$messages}}</td>
                            </tr>
                          </tbody>
                        </table>
                    </td>
                </tr>
                </tr>
            </table>
          </div>
        </td>
        <td>
            <tr>
                <td>
                  <p style="padding:0;margin:0;font-family: arial; width: 100%;font-size: 16px; line-height: 2;">Regards,</p>
                </td>
              </tr>
              <tr>
                <td>
                  <p style="padding:0;margin:0;font-family: arial; width: 100%;font-size: 12px; ">Friends Car Rental</p>
                </td>
              </tr>
        </td>

    </tr>
  </table>
 
</body>

</html>
