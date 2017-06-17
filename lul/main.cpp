#include <stdio.h>
#include <graphics.h>
#include <time.h>
#include <stdlib.h>


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

void drawStones(struct triangles toStone[])
{
   int i;
   for(i=0;i<12;i++)
   {
        for(int j=1;j<=toStone[i].stoneCount;j++)
        {
            int yPosUp;
            yPosUp=25*(2*j-1);
            circle(toStone[i].coordinates[0]+40,toStone[i].coordinates[1]+yPosUp,25);
            setfillstyle(SOLID_FILL,toStone[i].color);
            fillellipse(toStone[i].coordinates[0]+40,toStone[i].coordinates[1]+yPosUp,20,20);
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
int main()
{
    struct gamer Gamer1;
    struct gamer Gamer2;
    Gamer1.stoneCounfofPlayer=15;
    Gamer2.stoneCounfofPlayer=15;
    Gamer1.colorofPlayer=15;
    Gamer2.colorofPlayer=3;
    struct triangles places[24];
    int x[6]={62,60,140,60,101,350};
    int i;
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
    initwindow(1150,850);
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


    drawBackGammon(places);
    drawStones(places);
    POINT cursorPosition;

    while(1)
    {
        if(GetAsyncKeyState(VK_LBUTTON))
        {
            GetCursorPos(&cursorPosition);
            printf("%d ",cursorPosition.x);
            printf("%d\n",cursorPosition.y);

        }
        delay(100);
    }


 /*   int page=0;

        setactivepage(page);
        setvisualpage(1-page);

	page=1-page;*/



	getch();


	closegraph();
}
