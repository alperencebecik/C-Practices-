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
    int num;
};

struct node{
    int data;
    struct node *next;
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

struct node *head0=NULL;
struct node *head1=NULL;


void insert0(int x)
{
    if(head0==NULL)
    {
        head0=(struct node*)malloc(sizeof(struct node));
        head0->data=x;
        head0->next=NULL;
        return;
    }
    struct node *temp=head0;
    while(temp->next!=NULL)
    {
        temp=temp->next;
    }
    struct node *temp2=(struct node*)malloc(sizeof(struct node));
    temp2->data=x;
    temp->next=temp2;
    temp2->next=NULL;

}
void deletee0()
{
    struct node *temp=head0;
    while(temp->next!=NULL)
    {
        free(temp);
        temp=temp->next;
    }
    head0=NULL;
}
void display0()
{
	struct node *temp=head0;
	while(temp!=NULL)
	{
		printf("%d ",temp->data);
		temp=temp->next;
	}
}

void insert1(int x)
{
    if(head1==NULL)
    {
        head1=(struct node*)malloc(sizeof(struct node));
        head1->data=x;
        head1->next=NULL;
        return;
    }
    struct node *temp=head1;
    while(temp->next!=NULL)
    {
        temp=temp->next;
    }
    struct node *temp2=(struct node*)malloc(sizeof(struct node));
    temp2->data=x;
    temp->next=temp2;
    temp2->next=NULL;

}
void deletee1()
{
    struct node *temp=head1;
    while(temp->next!=NULL)
    {
        free(temp);
        temp=temp->next;
    }
    head1=NULL;
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
        *d11=d1;
        *d22=d2;
        decide(d1,0,0);
        decide(d2,30,30);
        drawBackGammon(t);
        drawStones(t);
}

void control0(int d1,int d2,int position,struct triangles pl[])
{
    int temp;
    for(int i=position;i>0;i--)
    {
        insert0(i);
    }
    for(int i=position;(i+12)<=24;i++ )
    {
        temp=i+13;
        insert0(i);
    }
}
void control1(int d1,int d2,int position,struct triangles pl)
{
    insert1(position+d1);
    insert1(position+d2);
    insert1(position+d1+d2);
}
int traverse0(int x)
{
    struct node *temp=head0;
    int k,l;
    while(temp!=NULL)
    {
        k=temp->data;
        if(k==x)
        {
            l=1;
        }
        temp=temp->next;
    }
    if(l==1)
    {
        return 1;
    }
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
    int old=0,brokenG1=0,brokenG2=0,temp3;
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
    initwindow(1150,850);
    int l=6;
    int k=13;
    int kk=13;
    int kkk=19;
    for(int i=0;i<24;i++)
    {
        places[i].stoneCount=0;
        if(i>=18 && i<=23)
        {
            places[i].num=l;
            l--;
        }
        if(i>=11 && i<=17)
        {
            places[i].num=k;
            k--;
        }
        if(i>=0 && i<=5)
        {
            places[i].num=kk;
            kk++;
        }
        if(i>=6 && i<=11)
        {
            places[i].num=kkk;
            kkk++;
        }
    }

   /* for(int i=0;i<24;i++)
    {
        printf("%d ",places[i].num);
    }*/

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
    int truetoPut=0,flag=0;
    drawBackGammon(places);

    drawStones(places);
    POINT cursorPosition;
    int clr,temp,temp2,stay=50,turn=0,playFor=0,diced=0,playTurn=1,truetoBreak=0,putSame=0,dicesum;
    int possibleMovements0[20],possibleMovements1[20];
    int turnArrow1[6]={550,345,590,345,570,330},turnArrow0[6]={550,385,590,385,570,400};
    int playArrow0[6]={550,430,590,430,570,450},playArrow1[6]={550,320,590,320,570,300};
    while(Gamer1.stoneCounfofPlayer>0 && Gamer2.stoneCounfofPlayer>0 )
    {
            setactivepage(page);
            setvisualpage(1-page);
            cleardevice();
            if(truetoPut==1)
            {
                setactivepage(page);
                //setvisualpage(1-page);
                places[temp3].stoneCount+=1;
                drawBackGammon(places);
                drawStones(places);
                truetoPut=0;
                if(turn==0)
                {
                    dicesum=dicesum-(temp2-temp);
                }
                else
                {
                    dicesum=dicesum-(temp-temp2);
                }
                if(dicesum==0)
                {
                   turn=!turn;
                   diced=0;
                }
            }
            if(truetoBreak==1)
            {
                setactivepage(page);
                places[temp2].stoneCount=1;
                drawBackGammon(places);
                drawStones(places);
                truetoBreak=0;
                diced=0;
                if(turn==0)
                {
                    Gamer2.brokenStone+=1;
                }
                else
                {
                    Gamer1.brokenStone+=1;
                }

                turn=!turn;
            }
            if(putSame==1)
            {
                setactivepage(page);
                places[temp3].stoneCount+=1;
                drawBackGammon(places);
                drawStones(places);
                putSame=0;
                diced=1;
            }
            if(turn==0 && diced==0)
            {
               fillpoly(3,turnArrow0);
                bar(550,345,590,385);
                outtextxy(553,359,"DICE");
            }
            else if(turn==1 && diced==0)
            {
                fillpoly(3,turnArrow1);
                bar(550,345,590,385);
                outtextxy(553,359,"DICE");
            }

            drawBackGammon(places);
            drawStones(places);

            if(diced==1)
            {
                setfillstyle(SOLID_FILL,WHITE);
                bar(530,360,560,390);
                bar(560,390,590,420);
                setfillstyle(SOLID_FILL,BLACK);
                decide(d1,0,0);
                decide(d2,30,30);
                if(playTurn==0)
                {
                    setfillstyle(SOLID_FILL,15);
                    fillpoly(3,playArrow0);
                }
                else if(playTurn==1)
                {
                    setfillstyle(SOLID_FILL,3);
                    fillpoly(3,playArrow1);
                }

                /*catch the stone*/

                if( (GetAsyncKeyState(VK_LBUTTON) && playTurn==0) && caught==0 )
                {
                    GetCursorPos(&cursorPosition);
                    int csx=cursorPosition.x;
                    int csy=cursorPosition.y;
                     for(int i=0;i<24;i++)
                    {
                        if( ((csx>= (places[i].coordinates[0])) && (csx<=(places[i].coordinates[2]) ))  )
                        {
                            if( ((csy<= (places[i].coordinates[5])) && (csy>=(places[i].coordinates[1]) )) || ((csy>= (places[i].coordinates[5])) && (csy<=(places[i].coordinates[1]) )))
                            {
                                if(places[i].stoneCount>=1 && places[i].color==15 )
                                {
                                    caught=1;
                                    temp=places[i].num;
                                    control0(d1,d2,temp,places);
                                    places[i].stoneCount-=1;
                                    break;

                                }
                            }
                        }
                    }
                    delay(100);
                }
                /*catch the stone */

                /*caught stone movement*/
                if(caught==1 && playTurn==0)
                {
                    GetCursorPos(&cursorPosition);
                    int cx=cursorPosition.x;
                    int cy=cursorPosition.y;
                    cleardevice();
                    drawBackGammon(places);
                    drawStones(places);
                    circle(cx,cy,25);
                    setfillstyle(SOLID_FILL,15);
                    fillellipse(cx,cy,20,20);
                    if(GetAsyncKeyState(VK_LBUTTON))
                    {
                        for(int i=0;i<24;i++)
                        {
                            if( ((cx>= (places[i].coordinates[0])) && (cx<=(places[i].coordinates[2]) ))  )
                            {
                                if( ((cy<= (places[i].coordinates[5])) && (cy>=(places[i].coordinates[1]) )) || ((cy>= (places[i].coordinates[5])) && (cy<=(places[i].coordinates[1]) )))
                                {

                                    if( (((places[i].stoneCount>=1 && places[i].color==15)) || (places[i].stoneCount==0)) || (places[i].stoneCount==1 && places[i].color==3 )  )
                                    {
                                        if(!(places[i].stoneCount==1 && places[i].color==3 ))
                                        {
                                            if(temp!=places[i].num && temp<places[i].num)
                                            {
                                                if(places[i].num<= temp+d1+d2)
                                                {
                                                    temp2=places[i].num;
                                                    caught=0;
                                                    truetoPut=1;
                                                    places[i].color=15;
                                                    temp3=i;
                                                    delay(100);
                                                }

                                            }
                                            else if(temp==places[i].num)
                                            {
                                                caught=0;
                                                putSame=1;
                                                places[i].color=15;
                                                temp2=places[i].num;
                                                temp3=i;
                                                delay(100);
                                            }
                                        }
                                        else
                                        {
                                            temp2=places[i].num;
                                            temp3=i;
                                            caught=0;
                                            truetoBreak=1;
                                            places[i].color=15;
                                            delay(100);
                                        }
                                    }
                                }

                            }
                        }
                    }


                }
                /*caught stone movement*/







                /*catch the stone*/

                if( (GetAsyncKeyState(VK_LBUTTON) && playTurn==1) && caught==0 )
                {

                    GetCursorPos(&cursorPosition);
                    int csx2=cursorPosition.x;
                    int csy2=cursorPosition.y;
                     for(int i=0;i<24;i++)
                    {
                        if( ((csx2>= (places[i].coordinates[0])) && (csx2<=(places[i].coordinates[2]) ))  )
                        {
                            if( ((csy2<= (places[i].coordinates[5])) && (csy2>=(places[i].coordinates[1]) )) || ((csy2>= (places[i].coordinates[5])) && (csy2<=(places[i].coordinates[1]) )))
                            {
                                if(places[i].stoneCount>=1 && places[i].color==3 )
                                {
                                    caught=1;
                                    temp=places[i].num;
                                    places[i].stoneCount-=1;
                                    break;
                                }
                            }

                        }
                    }
                    delay(100);
                }
                /*catch the stone */
                /*caught stone movement*/
                if(caught==1 && playTurn==1)
                {
                    GetCursorPos(&cursorPosition);
                    int cx2=cursorPosition.x;
                    int cy2=cursorPosition.y;
                    cleardevice();
                    drawBackGammon(places);
                    drawStones(places);
                    circle(cx2,cy2,28);
                    setfillstyle(SOLID_FILL,3);
                    fillellipse(cx2,cy2,22,22);
                    if(GetAsyncKeyState(VK_LBUTTON))
                    {
                        for(int i=0;i<24;i++)
                        {
                            if( ((cx2>= (places[i].coordinates[0])) && (cx2<=(places[i].coordinates[2]) ))  )
                            {
                                if( ((cy2<= (places[i].coordinates[5])) && (cy2>=(places[i].coordinates[1]) )) || ((cy2>= (places[i].coordinates[5])) && (cy2<=(places[i].coordinates[1]) )))
                                {
                                    if( (((places[i].stoneCount>=1 && places[i].color==3)) || (places[i].stoneCount==0)) || (places[i].stoneCount==1 && places[i].color==15 )  )
                                    {
                                        if(!(places[i].stoneCount==1 && places[i].color==15 ))
                                        {
                                            if(temp!=i)
                                            {
                                                temp2=i;
                                                caught=0;
                                                truetoPut=1;
                                                places[i].color=3;
                                            }
                                            else
                                            {
                                                caught=0;
                                                putSame=1;
                                                places[i].color=3;
                                                temp2=i;
                                            }
                                        }
                                        else
                                        {
                                            temp2=i;
                                            caught=0;
                                            truetoBreak=1;
                                            places[i].color=3;
                                        }
                                    }
                                }

                            }
                        }
                    }

                }
                /*caught stone movement*/
            }
            /*dicing*/
            if(GetAsyncKeyState(VK_LBUTTON) && diced==0)
            {

                GetCursorPos(&cursorPosition);
                if(cursorPosition.x<=590 && cursorPosition.x>=550)
                {
                    if(cursorPosition.y>=345 && cursorPosition.y<=395)
                    {
                        stay=50;
                        while(stay<70)
                        {

                            setactivepage(page);
                            setvisualpage(1-page);
                            cleardevice();
                            dice(places,&d1,&d2);
                            delay(2*stay);
                            stay=stay+2;
                            page=1-page;
                            diced=1;

                        }
                        playTurn=!playTurn;
                        dicesum=d1+d2;
                    }
                }
                delay(100);
            }
             /*dicing*/
            page=1-page;
            delay(20);
    }

	getch();
	closegraph();
}
