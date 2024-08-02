<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ $title }}</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
      rel="stylesheet">

  <!-- Main CSS File -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
      /* admission page style */
      .admission-header-section {
          border-bottom: 8px double blue;
          padding-bottom: 10px;
      }

      .school-name {
          color: #1691f1;
          font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      }

      .school-address {
          color: rgb(223, 20, 20);
      }

      .school-contact {
          color: rgb(85, 83, 83);
      }

      .admission-logo img {
          max-width: 120px;
      }

      .admission-logo-watermark img {
          position: absolute;
          max-width: 50%;
          z-index: 999;
          opacity: 0.1;
          left: 25%;
          top: 60%;
      }

      .student-info {
          margin-top: 20px;
          margin-bottom: 20px;
          margin-left: 25px;
          
      }

      .student-info img {
          width: 130px;
          max-height: 140px;
          object-fit: cover;
      }

      .signature {
          margin-top: 50px;
      }

      .info-item {
          font-size: 19px;
          margin: 35px;
      }

      @media (max-width: 800px) {
          .admission-logo img {
              max-width: 100px;
          }

          .school-name {
              font-size: 30px;
          }

          .school-address {
              font-size: 19px;
          }

          .info-item {
          font-size: 18px;
          margin: 30px;
      }
      }

      @media (max-width: 650px) {
          .admission-logo img {
              max-width: 80px;
          }

          .school-name {
              font-size: 26px;
          }

          .school-address {
              font-size: 17px;
          }

          .info-item {
          font-size: 16px;
          margin: 20px;
      }
      }

      @media (max-width: 450px) {
          .admission-logo img {
              max-width: 60px;
          }

          .school-name {
              font-size: 22px;
          }

          .school-address {
              font-size: 15px;
          }

          .school-website {
              font-size: 13px;
          }

          .info-item {
          font-size: 14px;
          margin: 10px;
      }
      }

      @media print {
          .admission-logo-watermark {
              z-index: -1;
          }

          .admission-logo-watermark img {
          position: absolute;
          max-width: 50%;
          z-index: 999;
          opacity: 0.1;
          left: 25%;
          top: 20%;
      }

      }
  </style>
</head>