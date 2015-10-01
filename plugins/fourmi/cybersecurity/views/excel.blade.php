<html>
  <head>
    <meta charset="utf-8">

    <style>
    .ind-title{
      border-top: 1px solid #fff;
      border-bottom:  1px solid #fff;
    }
    .sample{
      background-color:	#000000;
      color:	#FFFFFF;
      font-weight:	bold;
      font-style:	italic;
      font-weight:	bold;
      font-size:	20px;
      font-family:	Open Sans;
      text-decoration:	underline;
      text-align:	center;
      vertical-align:	middle;
      border:	1px dashed #CCC;
      width:	100;
      height:	1100;
    }

    .heading1{
      font-size: 16px;
      font-weight: bold;
      height: 30px;
    }
    .heading2{
      font-size: 12px;
      font-weight: bold;
      height: 20px;
      color: #666;
    }

    .fgc-1{ color: #418b41;}
    .fgc-2{ color: #126da2;}
    .fgc-3{ color: #ed8824;}
    .fgc-4{ color: #d51d24;}
    .fgc-5{ color: #eac01d;}

    .bgc-1{ background-color: #418b41;}
    .bgc-2{ background-color: #126da2;}
    .bgc-3{ background-color: #ed8824;}
    .bgc-4{ background-color: #d51d24;}
    .bgc-5{ background-color: #eac01d;}

    .ml{
      border:	2px solid #ccc;
    }
    </style>


  </head>
  <body>

    <table>
      <tr>
        <td class="heading2">Observatorio de la CiberSeguridad en Latinoamerica y el Caribe</td>
      </tr>
      <tr>
        <td></td>
        @foreach ($countries as $country)
          <td></td>
          <td style="font-weight: bold;" colspan="5" align="center">{{ $country['name'] }}</td>
        @endforeach
      </tr>
      @foreach ($dimensions as $dimension)
        <tr>
          <td width="80" align="right" class="heading1 fgc-{{ $dimension->id }}">{{ $dimension->title }}</td>
        </tr>
        <tr>
        </tr>
        @foreach ($dimension->factors as $factor)
          <tr>
            <td style="font-weight: bold;" align="right">{{ $factor->title }}</td>
          </tr>
          @foreach ($factor->indicators as $indicator)
            <tr height="5"><td></td></tr>
            <tr>
              <td valign="middle" align="right" class="ind-title fgc-{{ $dimension->id }}">{{ $indicator->title }}</td>
              @foreach ($countries as $country)
                <td width="5" ></td>
                @for ($i = 1; $i <= 5; $i++)
                  @if ( $i <= $country['maturity_levels'][$indicator->id])
                    <td height="15" width="3" class="ml bgc-{{ $dimension->id }}"></td>
                  @else
                    <td height="15" class="ml"></td>
                  @endif
                @endfor
              @endforeach
            </tr>
            <tr height="5"><td></td></tr>
          @endforeach
        @endforeach
        <tr height="5"><td></td></tr>
      @endforeach
    </table>




  </body>
</html>
