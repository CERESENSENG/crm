<!DOCTYPE html>
<html lang="en">
    @include('includes_landingPage.head')

<body class="index-page">
    @include('includes_landingPage.header')
    
     <div class="main">
          <!-- Hero Section -->
        
       {{ $slot }} 
      
      

      @include('includes_landingPage.sections') 
     </div> 

     @include('includes_landingPage.footer') 

     @include('includes_landingPage.scripts') 
    
</body>
</html>