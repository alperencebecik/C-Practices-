#include <stdio.h>
#include <graphics.h>
#include <time.h>
#include <stdlib.h>
#include <windows.h>
#include <mmsystem.h>

#define SND_FILENAME 0x20000
#define SND_LOOP 1
#define SND_ASYNC 1

void roadline0(int speed,bool IsItStarted,int increasedy,int increasedy2,int increasedy3,int increasedy4,int increasedy5,bool new_line,int linecounter,bool new_line2)
{
    int FirstLine_x1=310,FirstLine_y1=0,FirstLine_x2=320,FirstLine_y2=150;
    int SecondLine_x1=310,SecondLine_y1=200,SecondLine_x2=320,SecondLine_y2=350;
    int ThirdLine_x1=310,ThirdLine_y1=400,ThirdLine_x2=320, ThirdLine_y2=550;
    int FourthLine_x1=310,FourthLine_y1=600,FourthLine_x2=320,FourthLine_y2=750;
    int FifthLine_x1=310,FifthLine_y1=800,FifthLine_x2=320,FifthLine_y2=950;
    if(IsItStarted)
    {
      bar(FirstLine_x1,FirstLine_y1+increasedy,FirstLine_x2,FirstLine_y2+increasedy);
      bar(SecondLine_x1,SecondLine_y1+increasedy,SecondLine_x2,SecondLine_y2+increasedy);
      bar(ThirdLine_x1,ThirdLine_y1+increasedy,ThirdLine_x2,ThirdLine_y2+increasedy);
      bar(FourthLine_x1,FourthLine_y1+increasedy,FourthLine_x2,FourthLine_y2+increasedy);
      bar(FifthLine_x1,FifthLine_y1+increasedy,FifthLine_x2,FifthLine_y2+increasedy);
    }
    else
    {
      bar(FirstLine_x1,FirstLine_y1,FirstLine_x2,FirstLine_y2);
      bar(SecondLine_x1,SecondLine_y1,SecondLine_x2,SecondLine_y2);
      bar(ThirdLine_x1,ThirdLine_y1,ThirdLine_x2,ThirdLine_y2);
      bar(FourthLine_x1,FourthLine_y1,FourthLine_x2,FourthLine_y2);
      bar(FifthLine_x1,FifthLine_y1,FifthLine_x2,FifthLine_y2);
    }
    if(new_line)
    {

        if(increasedy2<=150)
        {
         FirstLine_y2-=150;
         bar(FirstLine_x1,FirstLine_y1,FirstLine_x2,FirstLine_y2+increasedy2);
        }
        else
        {
         bar(FirstLine_x1,FirstLine_y1+increasedy-150,FirstLine_x2,FirstLine_y2+increasedy-150);
        }
    }
}


void roadmap()
{
     bar(650,200,690,210);
     line(670,200,670,600);
     bar(650,600,690,610);
}

int main()
{
    srand(time(NULL));
    int gd=DETECT;
    int gm;
    initgraph(&gm,&gd,"C:\\TC\\BGI");

    char aa[50]="Road Fighter Game";
    initwindow(800,800,aa);
    int page=0;
    char StartControl;
    int carspeed=30;
    int increasedy=3, increasedy2=3 , increasedy3=3 , increasedy4=3 , increasedy5=5;
    bool IsItStarted=false;
    bool new_line=false,new_line2=false;
    int linespeed;
    int linecounter=0;
    int gear=0;
     int font=5;
    int ss1;
    int ss2;
    int ss3;
    int ss4;





    int dly;
    int movecar=5;
    int fuely1=10;
    int s5;
    int fuely2=20;
    char writegear[1];
    char writelifes[20]="Lifes : 3";
    bool isfuelcreated=false;
    char writegear2[20]="Gear : N" ;
    int xcar[20]={295,335,295,300,334,330,300,330,300,330,295,300,334,326,301,326};
    int fuelxs[8]={500,550,450,500,350,400,100,150};
    int ymp[2]={595,585};
    int movecarmap;
    int cnt=1;
    int i=0;
    int j=0;
    int AverageObstacleX=300;
    int ObstacleY1=10;
    int ObstacleY2=20;
    int AverageFuelX=300;
    bool TruckSpeedRandom=false;
    bool FuelSpeedRandom=false;
    bool fuel=false;
    int ss7;
    bool obstacletruck=false;
    bool obstacletruck1=false;
    bool TruckSpeedRandom1=false;
    int AverageObstacle1X=200;
    int Obstacle1Y1=10;
    int Obstacle1Y2=20;
    int y=100;
    int s1;
    int s2;
    int s3=0;
    int s4=0;
    int s6;
    int s7;
    int s10;
    int s11;
    int s12;
    int s14;
    int lifes=3;
    int ss6;
    int s13;

    bool fuel2=true;
    int obstacley;
    int fuelbarx2=795;
    roadline0(carspeed,IsItStarted,increasedy,increasedy2,increasedy3,increasedy4,increasedy5,new_line,linecounter,new_line2);
    roadmap();
    line(10,0,10,800);
    line(610,0,610,800);
    bar(690,50,795,70);

    outtextxy(640,53,"Fuel: ");
    outtextxy(650,90,"Lifes :  3");
    bar(660,ymp[0],680,ymp[1]);
    outtextxy(650,120,writegear2);
     bar(xcar[0],650,xcar[1],670);
    line(xcar[2],650,xcar[3],640);
    line(xcar[4],650,xcar[5],640);
    line(xcar[6],640,xcar[7],640);
    bar(xcar[8],640,xcar[9],620);
    line(xcar[10],670,xcar[11],680);
    line(xcar[12],670,xcar[13],680);
    bar(xcar[14],680,xcar[15],690);


    printf("Please press 'S' or 's' key to start Car Game");
    scanf("%c",&StartControl);


    if(StartControl=='s' || StartControl=='S')
    {
        PlaySound("C:\\Kalimba.wav",NULL,SND_FILENAME|SND_LOOP|SND_ASYNC);

        gear=1;
        dly=30;
        IsItStarted=true;
        while(1)
        {



            setactivepage(page);
            setvisualpage(1-page);
            cleardevice();
            roadmap();
            bar(690,50,fuelbarx2,70);
            outtextxy(640,53,"Fuel : ");
            outtextxy(650,90,writelifes);
            switch(gear)
            {
            case 1:
                cnt+=1;
                movecarmap=3;
                movecar=9;
                dly=20;
                carspeed=40;
                if(GetAsyncKeyState(VK_RIGHT) && xcar[1] <=604)
                {
                bar(xcar[0]+=movecar,650,xcar[1]+=movecar,670);
                line(xcar[2]+=movecar,650,xcar[3]+=movecar,640);
                line(xcar[4]+=movecar,650,xcar[5]+=movecar,640);
                line(xcar[6]+=movecar,640,xcar[7]+=movecar,640);
                bar(xcar[8]+=movecar,640,xcar[9]+=movecar,620);
                line(xcar[10]+=movecar,670,xcar[11]+=movecar,680);
                line(xcar[12]+=movecar,670,xcar[13]+=movecar,680);
                bar(xcar[14]+=movecar,680,xcar[15]+=movecar,690);
                }
                if(GetAsyncKeyState(VK_LEFT) && xcar[0] >=15)
                {
                bar(xcar[0]-=movecar,650,xcar[1]-=movecar,670);
                line(xcar[2]-=movecar,650,xcar[3]-=movecar,640);
                line(xcar[4]-=movecar,650,xcar[5]-=movecar,640);
                line(xcar[6]-=movecar,640,xcar[7]-=movecar,640);
                bar(xcar[8]-=movecar,640,xcar[9]-=movecar,620);
                line(xcar[10]-=movecar,670,xcar[11]-=movecar,680);
                line(xcar[12]-=movecar,670,xcar[13]-=movecar,680);
                bar(xcar[14]-=movecar,680,xcar[15]-=movecar,690);
                }
                break;
                case 2:
                cnt+=2;
                movecar=7;
                dly=16;
                carspeed=60;
                if(GetAsyncKeyState(VK_RIGHT) && xcar[1] <=604)
                {
                bar(xcar[0]+=movecar,650,xcar[1]+=movecar,670);
                line(xcar[2]+=movecar,650,xcar[3]+=movecar,640);
                line(xcar[4]+=movecar,650,xcar[5]+=movecar,640);
                line(xcar[6]+=movecar,640,xcar[7]+=movecar,640);
                bar(xcar[8]+=movecar,640,xcar[9]+=movecar,620);
                line(xcar[10]+=movecar,670,xcar[11]+=movecar,680);
                line(xcar[12]+=movecar,670,xcar[13]+=movecar,680);
                bar(xcar[14]+=movecar,680,xcar[15]+=movecar,690);
                }
                if(GetAsyncKeyState(VK_LEFT) && xcar[0] >=15)
                {
                bar(xcar[0]-=movecar,650,xcar[1]-=movecar,670);
                line(xcar[2]-=movecar,650,xcar[3]-=movecar,640);
                line(xcar[4]-=movecar,650,xcar[5]-=movecar,640);
                line(xcar[6]-=movecar,640,xcar[7]-=movecar,640);
                bar(xcar[8]-=movecar,640,xcar[9]-=movecar,620);
                line(xcar[10]-=movecar,670,xcar[11]-=movecar,680);
                line(xcar[12]-=movecar,670,xcar[13]-=movecar,680);
                bar(xcar[14]-=movecar,680,xcar[15]-=movecar,690);
                }
                break;
                case 3:
                cnt+=3;
                movecar=4;
                dly=14;
                carspeed=90;
                if(GetAsyncKeyState(VK_RIGHT) && xcar[1] <=604)
                {
                bar(xcar[0]+=movecar,650,xcar[1]+=movecar,670);
                line(xcar[2]+=movecar,650,xcar[3]+=movecar,640);
                line(xcar[4]+=movecar,650,xcar[5]+=movecar,640);
                line(xcar[6]+=movecar,640,xcar[7]+=movecar,640);
                bar(xcar[8]+=movecar,640,xcar[9]+=movecar,620);
                line(xcar[10]+=movecar,670,xcar[11]+=movecar,680);
                line(xcar[12]+=movecar,670,xcar[13]+=movecar,680);
                bar(xcar[14]+=movecar,680,xcar[15]+=movecar,690);
                }
                if(GetAsyncKeyState(VK_LEFT) && xcar[0] >=15)
                {
                bar(xcar[0]-=movecar,650,xcar[1]-=movecar,670);
                line(xcar[2]-=movecar,650,xcar[3]-=movecar,640);
                line(xcar[4]-=movecar,650,xcar[5]-=movecar,640);
                line(xcar[6]-=movecar,640,xcar[7]-=movecar,640);
                bar(xcar[8]-=movecar,640,xcar[9]-=movecar,620);
                line(xcar[10]-=movecar,670,xcar[11]-=movecar,680);
                line(xcar[12]-=movecar,670,xcar[13]-=movecar,680);
                bar(xcar[14]-=movecar,680,xcar[15]-=movecar,690);
                }
                break;
                case 4:
                cnt+=4;
                movecar=3;
                dly=10;
                carspeed=120;
                if(GetAsyncKeyState(VK_RIGHT) && xcar[1] <=604)
                {
                bar(xcar[0]+=movecar,650,xcar[1]+=movecar,670);
                line(xcar[2]+=movecar,650,xcar[3]+=movecar,640);
                line(xcar[4]+=movecar,650,xcar[5]+=movecar,640);
                line(xcar[6]+=movecar,640,xcar[7]+=movecar,640);
                bar(xcar[8]+=movecar,640,xcar[9]+=movecar,620);
                line(xcar[10]+=movecar,670,xcar[11]+=movecar,680);
                line(xcar[12]+=movecar,670,xcar[13]+=movecar,680);
                bar(xcar[14]+=movecar,680,xcar[15]+=movecar,690);
                }
                if(GetAsyncKeyState(VK_LEFT) && xcar[0] >=15)
                {
                bar(xcar[0]-=movecar,650,xcar[1]-=movecar,670);
                line(xcar[2]-=movecar,650,xcar[3]-=movecar,640);
                line(xcar[4]-=movecar,650,xcar[5]-=movecar,640);
                line(xcar[6]-=movecar,640,xcar[7]-=movecar,640);
                bar(xcar[8]-=movecar,640,xcar[9]-=movecar,620);
                line(xcar[10]-=movecar,670,xcar[11]-=movecar,680);
                line(xcar[12]-=movecar,670,xcar[13]-=movecar,680);
                bar(xcar[14]-=movecar,680,xcar[15]-=movecar,690);
                }
                break;
                case 5:
                cnt+=5;
                dly=7;
                movecar=2;
                carspeed=170;
                if(GetAsyncKeyState(VK_RIGHT) && xcar[1] <=604)
                {
                bar(xcar[0]+=movecar,650,xcar[1]+=movecar,670);
                line(xcar[2]+=movecar,650,xcar[3]+=movecar,640);
                line(xcar[4]+=movecar,650,xcar[5]+=movecar,640);
                line(xcar[6]+=movecar,640,xcar[7]+=movecar,640);
                bar(xcar[8]+=movecar,640,xcar[9]+=movecar,620);
                line(xcar[10]+=movecar,670,xcar[11]+=movecar,680);
                line(xcar[12]+=movecar,670,xcar[13]+=movecar,680);
                bar(xcar[14]+=movecar,680,xcar[15]+=movecar,690);
                }
                if(GetAsyncKeyState(VK_LEFT) && xcar[0] >=15)
                {
                bar(xcar[0]-=movecar,650,xcar[1]-=movecar,670);
                line(xcar[2]-=movecar,650,xcar[3]-=movecar,640);
                line(xcar[4]-=movecar,650,xcar[5]-=movecar,640);
                line(xcar[6]-=movecar,640,xcar[7]-=movecar,640);
                bar(xcar[8]-=movecar,640,xcar[9]-=movecar,620);
                line(xcar[10]-=movecar,670,xcar[11]-=movecar,680);
                line(xcar[12]-=movecar,670,xcar[13]-=movecar,680);
                bar(xcar[14]-=movecar,680,xcar[15]-=movecar,690);
                }
                break;
            }

            if(GetAsyncKeyState(VK_NUMPAD1))
            {
                gear=1;
            }
            if(GetAsyncKeyState(VK_NUMPAD2))
            {
                gear=2;
            }
            if(GetAsyncKeyState(VK_NUMPAD3))
            {
                gear=3;
            }
            if(GetAsyncKeyState(VK_NUMPAD4))
            {
                gear=4;
            }
            if(GetAsyncKeyState((VK_NUMPAD5)))
            {
                gear=5;
            }

            sprintf(writegear,"Gear: %d",gear);
            sprintf(writelifes,"Lifes : %d",lifes);
            outtextxy(650,120,writegear);
                line(10,0,10,800);
                line(610,0,610,800);
                if(cnt>500)
                {
                   bar(660,ymp[0]-=movecarmap,680,ymp[1]-=movecarmap);
                   cnt=0;
                   fuelbarx2-=5;
                   if(fuelbarx2<=700)
                   {
                       break;
                   }
                }
                else
                {
                   bar(660,ymp[0],680,ymp[1]);
                }
                line(xcar[2],650,xcar[3],640);
                bar(xcar[0],650,xcar[1],670);
                line(xcar[4],650,xcar[5],640);
                line(xcar[6],640,xcar[7],640);
                bar(xcar[8],640,xcar[9],620);
                line(xcar[10],670,xcar[11],680);
                line(xcar[12],670,xcar[13],680);
                bar(xcar[14],680,xcar[15],690);
            roadline0(carspeed,IsItStarted,increasedy,increasedy2,increasedy3,increasedy4,increasedy5,new_line,linecounter,new_line2);
            increasedy+=20;
            if(increasedy>50)
            {
                new_line=true;
                increasedy2+=20;
                if(increasedy2>=150)
                {
                    increasedy=0;
                    new_line=false;
                    increasedy2=0;
                }
            }





                time(NULL);
                s2=1+rand() % 300;


                if(lifes==0)
                {
                    cleardevice();
                    outtextxy(500,500,"Game over");
                    delay(100);
                    printf("\a");
                    delay(1000);
                    break;
                }
                if(fuel)
                {
                    bar(AverageFuelX,fuely1,AverageFuelX+20,fuely2);
                    outtextxy(AverageFuelX+10,fuely2,"F");

                    if(FuelSpeedRandom)
                    {
                      time(NULL);
                      s13=2+rand() %9;
                      FuelSpeedRandom=false;
                    }
                    fuely1+=s13;
                    fuely2+=s13;
                    if(fuely1 > 700)
                    {
                        fuel=false;
                        AverageFuelX=250;
                        fuely1=10;
                        fuely2=20;
                    }
                            if(xcar[8] < AverageFuelX +20 && xcar[8] > AverageFuelX )
                            {
                                if(xcar[9] > AverageFuelX +20 && xcar[9] > AverageFuelX )
                                {
                                    if(fuely2 > 610)
                                    {
                                        fuel=false;
                                        fuely2=20;
                                        fuely1=10;
                                        AverageFuelX=300;
                                        if(fuelbarx2<785)
                                        {
                                          printf("\a");
                                          fuelbarx2+=10;
                                        }


                                    }
                                }
                            }
                            if(xcar[8] < AverageFuelX +20  && xcar[8] < AverageFuelX )
                            {
                                if(xcar[9] <  AverageFuelX +20  && xcar[9] > AverageFuelX )
                                {
                                    if(fuely2 > 610)
                                    {
                                        fuel=false;
                                        fuely2=20;
                                        fuely1=10;
                                        AverageFuelX=300;
                                        if(fuelbarx2<785)
                                        {
                                          printf("\a");
                                          fuelbarx2+=10;
                                        }
                                    }
                                }
                            }

                            if(xcar[8] < AverageFuelX +20 && xcar[8] < AverageFuelX )
                            {
                                if(xcar[9] <  AverageFuelX +20 && xcar[9] > AverageFuelX )
                                {
                                    if(fuely2 > 610)
                                    {
                                        fuel=false;
                                        fuely2=20;
                                        fuely1=10;
                                        AverageFuelX=300;
                                        if(fuelbarx2<785)
                                        {
                                           printf("\a");
                                          fuelbarx2+=10;
                                        }

                                    }
                                }
                            }
                            if(xcar[8] <  AverageFuelX +20 && xcar[8] < AverageFuelX)
                            {
                                if(xcar[9] >  AverageFuelX +20 && xcar[9] > AverageFuelX)
                                {
                                    if(fuely2>610)
                                    {
                                        fuel=false;
                                        fuely2=20;
                                        fuely1=10;
                                        AverageFuelX=300;
                                        if(fuelbarx2<785)
                                        {
                                         printf("\a");
                                          fuelbarx2+=10;
                                        }

                                    }
                                }
                            }

                    }
                else
                {
                    if( s2==100)
                    {
                    fuel=true;
                    time(NULL);
                    x:
                    s10=5+rand() %13;
                    time(NULL);
                    s11=10+rand() %15;
                    time(NULL);
                    s14=30+rand() % 100;
                    time(NULL);
                    s12=1+rand() %2;
                    s10=s11*s10 +s14;
                    printf("%d %d",s10,s11);
                    if(s10 > 500 && s10<100)
                    {
                        goto x;
                    }
                    if(s12==2)
                    {
                        AverageFuelX+=s3;
                    }
                    else
                    {
                       AverageFuelX-=s3;
                    }
                    FuelSpeedRandom=true;
                    }
                }




                if(obstacletruck)
                {
                    bar(AverageObstacleX,ObstacleY1,AverageObstacleX+20,ObstacleY2);
                    bar(AverageObstacleX-10,ObstacleY1+10,AverageObstacleX+30,ObstacleY2+40);
                    if(TruckSpeedRandom)
                    {
                      time(NULL);
                      s7=5+rand() %10;
                      TruckSpeedRandom=false;
                    }
                    ObstacleY1+=s7;
                    ObstacleY2+=s7;
                    if(ObstacleY2 > 700)
                    {
                        obstacletruck=false;
                        AverageObstacleX=300;
                        ObstacleY1=10;
                        ObstacleY2=20;
                    }
                            if(xcar[8] <  AverageObstacleX +30 && xcar[8] < AverageObstacleX-10)
                            {
                                if(xcar[9] <  AverageObstacleX +30 && xcar[9] > AverageObstacleX-10)
                                {
                                    if(ObstacleY2>595)
                                    {
                                        obstacletruck=false;
                                        AverageObstacleX=300;
                                        ObstacleY1=10;
                                        ObstacleY2=20;
                                        lifes--;
                                        outtextxy(650,90,writelifes);
                                        printf("\a");
                                        delay(1000);
                                    }
                                }
                            }
                            if(xcar[8] <  AverageObstacleX +30 && xcar[8] > AverageObstacleX-10)
                            {
                                if(xcar[9] >  AverageObstacleX +30 && xcar[9] > AverageObstacleX-10)
                                {
                                    if(ObstacleY2>595)
                                    {
                                        obstacletruck=false;
                                        AverageObstacleX=300;
                                        ObstacleY1=10;
                                        ObstacleY2=20;
                                        lifes--;
                                        outtextxy(650,90,writelifes);
                                        printf("\a");
                                        delay(1000);
                                    }
                                }
                            }
                            if(xcar[8] <  AverageObstacleX +30 && xcar[8] > AverageObstacleX-10)
                            {
                                if(xcar[9] <  AverageObstacleX +30 && xcar[9] > AverageObstacleX-10)
                                {
                                    if(ObstacleY2>595)
                                    {
                                        obstacletruck=false;
                                        AverageObstacleX=300;
                                        ObstacleY1=10;
                                        ObstacleY2=20;
                                        lifes--;
                                        outtextxy(650,90,writelifes);
                                        printf("\a");
                                        delay(1000);
                                    }
                                }
                            }
                        }
                else
                {
                    if( 10<s2<20)
                    {
                    obstacletruck=true;
                    time(NULL);
                    s3=1+rand() %30;
                    time(NULL);
                    s4=1+rand() %10;
                    time(NULL);
                    s6=1+rand() %2;
                    s3=s4*s3;
                    if(s6==2)
                    {
                        AverageObstacleX+=s3;
                    }
                    else
                    {
                       AverageObstacleX-=s3;
                    }
                    TruckSpeedRandom=true;



                    }
                }



                if(obstacletruck1)
                {
                    bar(AverageObstacle1X,Obstacle1Y1,AverageObstacle1X+20,Obstacle1Y2);
                    bar(AverageObstacle1X-10,Obstacle1Y1+10,AverageObstacle1X+30,Obstacle1Y2+40);
                    if(TruckSpeedRandom1)
                    {
                      time(NULL);
                      ss7=5+rand() %10;
                      TruckSpeedRandom1=false;
                    }
                    Obstacle1Y1+=ss7;
                    Obstacle1Y2+=ss7;
                    if(Obstacle1Y2 > 700)
                    {
                        obstacletruck1=false;
                        AverageObstacle1X=300;
                        Obstacle1Y1=10;
                        Obstacle1Y2=20;
                    }
                            if(xcar[8] <  AverageObstacle1X +30 && xcar[8] < AverageObstacle1X-10)
                            {
                                if(xcar[9] <  AverageObstacle1X +30 && xcar[9] > AverageObstacle1X-10)
                                {
                                    if(Obstacle1Y2>595)
                                    {
                                        obstacletruck1=false;
                                        AverageObstacle1X=300;
                                        Obstacle1Y1=10;
                                        Obstacle1Y2=20;
                                        lifes--;
                                        outtextxy(650,90,writelifes);
                                        printf("\a");
                                        delay(1000);
                                    }
                                }
                            }
                            if(xcar[8] <  AverageObstacle1X +30 && xcar[8] > AverageObstacle1X-10)
                            {
                                if(xcar[9] >  AverageObstacle1X +30 && xcar[9] > AverageObstacle1X-10)
                                {
                                    if(Obstacle1Y2>595)
                                    {
                                        obstacletruck1=false;
                                        AverageObstacle1X=300;
                                        Obstacle1Y1=10;
                                        Obstacle1Y2=20;
                                        lifes--;
                                        outtextxy(650,90,writelifes);
                                        printf("\a");
                                        delay(1000);
                                    }
                                }
                            }
                            if(xcar[8] <  AverageObstacle1X +30 && xcar[8] > AverageObstacle1X-10)
                            {
                                if(xcar[9] <  AverageObstacle1X +30 && xcar[9] > AverageObstacle1X-10)
                                {
                                    if(Obstacle1Y2>595)
                                    {
                                        obstacletruck1=false;
                                        AverageObstacle1X=300;
                                        Obstacle1Y1=10;
                                        Obstacle1Y2=20;
                                        lifes--;
                                        outtextxy(650,90,writelifes);
                                        printf("\a");
                                        delay(1000);
                                    }
                                }
                            }
                        }
                else
                {
                    if( 20<s2<40)
                    {
                    obstacletruck1=true;
                    time(NULL);
                    ss3=1+rand() %30;
                    time(NULL);
                    ss4=1+rand() %10;
                    time(NULL);
                    ss6=1+rand() %2;
                    ss3=ss4*ss3;
                    if(ss6==2)
                    {
                        AverageObstacle1X+=ss3;
                    }
                    else
                    {
                       AverageObstacle1X-=ss3;
                    }
                    TruckSpeedRandom1=true;



                    }
                }
                if(ymp[0]<190)
                {
                    break;
                }





         page=1-page;
         delay(dly);

        }
    }

    getch();
    closegraph();
    }
