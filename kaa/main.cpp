#include <stdio.h>
#include <graphics.h>
#include <time.h>
#include <stdlib.h>
#include <math.h>


struct gamer{
    int stoneCounfofPlayer;
    int brokenStone;
    int colorofPlayer;
};

struct triangles{
    int color;
    int stoneCount;
    int coordinates[6];
};


void five(int x,int y)
{
    fillellipse(537+x,367+y,3,3);
    fillellipse(552+x,367+y,3,3);
    fillellipse(545+x,376+y,3,3);
    fillellipse(537+x,383+y,3,3);
    fillellipse(552+x,383+y,3,3);
}
void one(int x,int y)
{
    fillellipse(545+x,376+y,3,3);
}
void three(int x,int y)
{
   fillellipse(537+x,367+y,3,3);
   fillellipse(545+x,376+y,3,3);
   fillellipse(552+x,383+y,3,3);
}
void four(int x,int y)
{
    fillellipse(538+x,367+y,3,3);
    fillellipse(553+x,367+y,3,3);
    fillellipse(538+x,384+y,3,3);
    fillellipse(553+x,384+y,3,3);
}
void six(int x,int y)
{
    fillellipse(538+x,366+y,3,3);
    fillellipse(538+x,374+y,3,3);
    fillellipse(538+x,382+y,3,3);
    fillellipse(550+x,366+y,3,3);
    fillellipse(550+x,374+y,3,3);
    fillellipse(550+x,382+y,3,3);

}
void two(int x,int y)
{
   fillellipse(539+x,369+y,3,3);
   fillellipse(550+x,380+y,3,3);
}

void decide(int x,int a,int b)
{
    if(x==1)
    {
        one(a,b);
    }
    else if(x==2)
    {
        two(a,b);
    }
    else if(x==3)
    {
        three(a,b);
    }
    else if(x==4)
    {
        four(a,b);
    }
    else if(x==5)
    {
        five(a,b);
    }
    else
    {
        six(a,b);
    }
}


void drawStones(struct triangles toStone[])
{
   int i,temp1=-1,temp2=-1;
   for(i=0;i<12;i++)
   {
        for(int j=1;j<=toStone[i].stoneCount;j++)
        {
            int yPosUp;
            yPosUp=25*(2*j-1);
            circle(toStone[i].coordinates[0]+40,toStone[i].coordinates[1]+yPosUp,25);
            setfillstyle(SOLID_FILL,toStone[i].color);
            fillellipse(toStone[i].coordinates[0]+40,toStone[i].coordinates[1]+yPosUp,20,20);
            if(j>5)
            {
                temp1=i;
                break;
            }
        }
   }
   for(int k=i;k<24;k++)
   {
        for(int n=1;n<=toStone[k].stoneCount;n++)
        {
            int yPosDown;
            yPosDown=25*(2*n-1);
            circle(toStone[k].coordinates[0]+40,toStone[k].coordinates[3]-yPosDown,25);
            setfillstyle(SOLID_FILL,toStone[k].color);
            fillellipse(toStone[k].coordinates[0]+40,toStone[k].coordinates[3]-yPosDown,20,20);
            if(n>5)
            {
                temp2=k;
                break;
            }
        }
   }


}


void drawBackGammon(struct triangles p[])
{
    rectangle(40,40,570,770);
    rectangle(60,60,546,750);
    rectangle(570,40,1100,770);
    rectangle(590,60,1080,750);

    int i;
    for(i=0;i<24;i++)
    {
       if(i%2==0)
       {
           setfillstyle(SOLID_FILL,RED);
           fillpoly(3,p[i].coordinates);
       }
       else
       {
           setfillstyle(SOLID_FILL,BLACK);
           fillpoly(3,p[i].coordinates);
       }
    }
}
void dice(struct triangles t[],int *d11,int *d22)
{
    setfillstyle(SOLID_FILL,WHITE);
    bar(530,360,560,390);
    bar(560,390,590,420);
    setfillstyle(SOLID_FILL,BLACK);
    int d1,d2,i=1;

        d1 = rand() % 6 +1;
        d2 = rand() % 6 +1;
        decide(d1,0,0);
        decide(d2,30,30);
        *d11=d1;
        *d22=d2;
        drawBackGammon(t);
        drawStones(t);
}

int main()
{
    srand(time(NULL));
    struct gamer Gamer1;
    struct gamer Gamer2;
    Gamer1.stoneCounfofPlayer=15;
    Gamer2.stoneCounfofPlayer=15;
    Gamer1.colorofPlayer=15;
    Gamer2.colorofPlayer=3;
    struct triangles places[24];
    int old=0,brokenG1=0,brokenG2=0;
    int x[6]={62,60,140,60,101,350};
    int i,page=0,caught=0,whichStoneBroke,d1,d2;
    for(i=0;i<6;i++)
    {
        places[i].coordinates={x[0],x[1],x[2],x[3],x[4],x[5]};
        x[0]=x[2]+2;
        x[2]+=81;
        x[4]+=81;
    }
    x[0]=592;
    x[2]=x[0]+78;
    x[4]=x[0]+39;
    for(i;i<12;i++)
    {
       places[i].coordinates={x[0],x[1],x[2],x[3],x[4],x[5]};
       x[0]=x[2]+2;
       x[2]+=82;
       x[4]+=82;
    }
    x[0]=62;
    x[1]=750;
    x[2]=140;
    x[3]=750;
    x[4]=101;
    x[5]=447;
    for(i;i<18;i++)
    {
        places[i].coordinates={x[0],x[1],x[2],x[3],x[4],x[5]};
        x[0]=x[2]+2;
        x[2]+=81;
        x[4]+=81;
    }
    x[0]=592;
    x[2]=x[0]+78;
    x[4]=x[0]+39;
    for(i;i<24;i++)
    {
        places[i].coordinates={x[0],x[1],x[2],x[3],x[4],x[5]};
        x[0]=x[2]+2;
        x[2]+=81;
        x[4]+=81;
    }
    int gd=DETECT;
    int gm;
    initgraph(&gm,&gd,"C:\\TC\\BGI");
    initwindow(1150,750);
    for(int i=0;i<24;i++)
    {
        places[i].stoneCount=0;
    }
    places[0].stoneCount=5;
    places[4].stoneCount=3;
    places[6].stoneCount=5;
    places[11].stoneCount=2;
    places[12].stoneCount=5;
    places[16].stoneCount=3;
    places[18].stoneCount=5;
    places[23].stoneCount=2;

    places[0].color=15;
    places[4].color=3;
    places[6].color=3;
    places[11].color=15;
    places[12].color=3;
    places[16].color=15;
    places[18].color=15;
    places[23].color=3;
    int neww=0;
    int truetoPut=0;
    drawBackGammon(places);
    drawStones(places);
    POINT cursorPosition;
    int clr,temp,temp2,stay=50;
    while(stay<70)
    {
      setactivepage(page);
      setvisualpage(1-page);
      cleardevice();
      dice(places,&d1,&d2);
      delay(2*s tay);
      stay=stay+2;
      page=1-page;
    }

    while(Gamer1.stoneCounfofPlayer>0 && Gamer2.stoneCounfofPlayer>0 )
    {

    }





	getch();


	closegraph();
}
