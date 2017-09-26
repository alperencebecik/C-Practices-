#include <stdio.h>
#include <stdlib.h>
#include <graphics.h>
#include <time.h>

struct head{
    int x1,x2,y1,y2;
    int num;
    char direction;
};

struct feedArray{
    int x1[40];
    int y1[40];
};

struct part{
    char direction;
    int num;
    int x1,x2,y1,y2;
};

struct snake{
    struct head h;
    struct part s[100];
    int length;
};

void draw(struct snake snake1 ){
    setfillstyle(SOLID_FILL,3);
    bar(snake1.h.x1,snake1.h.y1,snake1.h.x2,snake1.h.y2);
    for(int i=0;i<snake1.length-1;i++){

        bar(snake1.s[i].x1,snake1.s[i].y1,snake1.s[i].x2,snake1.s[i].y2);
    }
    rectangle(20,20,400,400);
}

void feed(int *x1,int *y1,int *signal,struct feedArray *feed){

    int randx,randy;
    if(*signal==1){
        srand(time(NULL));
        randx=rand()%40;
        randy=rand()%40;
        *x1=feed->x1[randx];
        *y1=feed->y1[randy];
        //printf("%d %d\n",*x1,*y1);
    }
    setfillstyle(SOLID_FILL,10);
    bar(*x1,*y1,*x1+10,*y1+10);
    *signal=0;
}

void tailAdder(struct snake *snake1){
    int i = (*snake1).length-1;

    if( (*snake1).s[i-1].direction=='r'){
            (*snake1).s[i].x1=(*snake1).s[i-1].x1;
            (*snake1).s[i].y1=(*snake1).s[i-1].y1;
            (*snake1).s[i].x2=(*snake1).s[i-1].x2;
            (*snake1).s[i].y2=(*snake1).s[i-1].y2;
            (*snake1).s[i].num=(*snake1).s[i-1].num+1;
    }
    else if((*snake1).s[i-1].direction=='l'){
            (*snake1).s[i].x1=(*snake1).s[i-1].x1;
            (*snake1).s[i].y1=(*snake1).s[i-1].y1;
            (*snake1).s[i].x2=(*snake1).s[i-1].x2;
            (*snake1).s[i].y2=(*snake1).s[i-1].y2;
            (*snake1).s[i].num=(*snake1).s[i-1].num+1;
    }
    else if((*snake1).s[i-1].direction=='u'){
            (*snake1).s[i].x1=(*snake1).s[i-1].x1;
            (*snake1).s[i].y1=(*snake1).s[i-1].y1;
            (*snake1).s[i].x2=(*snake1).s[i-1].x2;
            (*snake1).s[i].y2=(*snake1).s[i-1].y2;
            (*snake1).s[i].num=(*snake1).s[i-1].num+1;
    }
    else if((*snake1).s[i-1].direction=='d'){
            (*snake1).s[i].x1=(*snake1).s[i-1].x1;
            (*snake1).s[i].y1=(*snake1).s[i-1].y1;
            (*snake1).s[i].x2=(*snake1).s[i-1].x2;
            (*snake1).s[i].y2=(*snake1).s[i-1].y2;
            (*snake1).s[i].num=(*snake1).s[i-1].num+1;
    }
    (*snake1).length+=1;
}

void fedorNot(struct snake *snake1,int x1,int y1,int *signal){
    if( ((*snake1).h.x1==x1 && (*snake1).h.y1==y1 ) && *signal==0 ){
    tailAdder(snake1);
    *signal=1;
    }
}

void drawOptions(struct snake *snake1){
    char scoreText[20];
    rectangle(430,20,630,400);
    settextstyle(COMPLEX_FONT, HORIZ_DIR, 1);
    sprintf(scoreText,"%d",(*snake1).length);
    outtextxy(440,40,"Score: ");
    outtextxy(535,40,scoreText);
    rectangle(510,40,570,60);

}

void update(struct snake *snake1,int speed){

  /*  for(int i=0;i<4;i++){
        printf("%c %d\n",(*snake1).s[i].direction,i);
    }*/
  //  printf("%d",snake1->length);
    if((*snake1).h.direction=='r'){
        (*snake1).h.x1+=speed;
        (*snake1).h.x2+=speed;
    }
    else if((*snake1).h.direction=='l'){
        (*snake1).h.x1-=speed;
        (*snake1).h.x2-=speed;
    }
    else if((*snake1).h.direction=='u'){
        (*snake1).h.y1-=speed;
        (*snake1).h.y2-=speed;
    }
    else if((*snake1).h.direction=='d'){
        (*snake1).h.y1+=speed;
        (*snake1).h.y2+=speed;
    }

    for(int i=0;i<(*snake1).length-1;i++){
        if((*snake1).s[i].direction=='r'){
            (*snake1).s[i].x1+=speed;
            (*snake1).s[i].x2+=speed;
        }
        else if((*snake1).s[i].direction=='l'){
            (*snake1).s[i].x1-=speed;
            (*snake1).s[i].x2-=speed;
        }
        else if((*snake1).s[i].direction=='u'){
            (*snake1).s[i].y1-=speed;
            (*snake1).s[i].y2-=speed;
        }
        else if((*snake1).s[i].direction=='d'){
            (*snake1).s[i].y1+=speed;
            (*snake1).s[i].y2+=speed;
        }
    }
}

void initialize(struct snake *snake1,int snakeLength){

        (*snake1).h.direction='r';
        (*snake1).h.x1=70;
        (*snake1).h.y1=50;
        (*snake1).h.x2=80;
        (*snake1).h.y2=60;
        (*snake1).h.num=0;
        (*snake1).length=1;

        (*snake1).s[0].direction='r';
        (*snake1).s[0].x1=60;
        (*snake1).s[0].y1=50;
        (*snake1).s[0].x2=70;
        (*snake1).s[0].y2=60;
        (*snake1).s[0].num=1;
        (*snake1).length=2;


        for(int i=1;i<snakeLength-1;i++){
            (*snake1).s[i].direction='r';
            (*snake1).s[i].x1=(*snake1).s[i-1].x1-10;
            (*snake1).s[i].y1=(*snake1).s[i-1].y1;
            (*snake1).s[i].x2=(*snake1).s[i-1].x2-10;
            (*snake1).s[i].y2=(*snake1).s[i-1].y2;
            (*snake1).s[i].num=(*snake1).s[i-1].num+1;
            (*snake1).length+=1;
        }
}


void updateDirection(struct snake *snake1){
        for(int i=(*snake1).length-2;i>=0;i--){
        if((*snake1).s[i].direction!=(*snake1).s[i-1].direction  ){
            (*snake1).s[i].direction=(*snake1).s[i-1].direction;
        }
    }
    if((*snake1).s[0].direction!=(*snake1).h.direction){
        (*snake1).s[0].direction=(*snake1).h.direction;
    }
}

void keyState(struct snake *snake1){
    if( ( (GetAsyncKeyState(VK_LEFT) && (*snake1).h.direction!='r') && (*snake1).h.direction!='l') ){
            (*snake1).h.direction='l';
        }
        else if ( (GetAsyncKeyState(VK_RIGHT) && (*snake1).h.direction!='l') && (*snake1).h.direction!='r'){
            (*snake1).h.direction='r';
        }
        else if((( GetAsyncKeyState(VK_UP) && (*snake1).h.direction!='d') && (*snake1).h.direction!='u') && (!GetAsyncKeyState(VK_RIGHT ) && !GetAsyncKeyState(VK_LEFT ) ) ){
            (*snake1).h.direction='u';
        }
        else if( ((GetAsyncKeyState(VK_DOWN) && (*snake1).h.direction!='u') && (*snake1).h.direction!='d') && (!GetAsyncKeyState(VK_LEFT)&& !GetAsyncKeyState(VK_RIGHT ) )  ){
            (*snake1).h.direction='d';
        }
}

void crashControl(struct snake *snake1){
    if( (((*snake1).h.x1==10 || (*snake1).h.y1==400 )) || ( (*snake1).h.x1==400 || (*snake1).h.y1==10))  {
        cleardevice();
        settextstyle(COMPLEX_FONT, HORIZ_DIR, 3);
        outtextxy(150, 180, "Game over");
        delay(200);
    }
}


void crashSelf(struct snake *snake1){
    int i = snake1->length;
    for(int j=0;j<i-1;j++){
        if( snake1->h.x1==snake1->s[j].x1 && snake1->h.y1==snake1->s[j].y1 ){
            cleardevice();
            settextstyle(COMPLEX_FONT, HORIZ_DIR, 3);
            outtextxy(150, 180, "Game over");
            delay(200);
        }
    }
}

void finish(struct snake *snake1){
    if(snake1->length==1300){
        cleardevice();
        settextstyle(COMPLEX_FONT, HORIZ_DIR, 3);
        outtextxy(150, 180, "You Won");
        delay(200);
    }
}

void arrayShuffle(struct feedArray *feed){
    int index1,index2,temp;
    for(int i=0;i<40;i++){
        index1=rand()%40;
        index2=rand()%40;
        temp=feed->x1[index1];
        feed->x1[index1]=feed->x1[index2];
        feed->x1[index2]=temp;
    }
    for(int i=0;i<40;i++){
        index1=rand()%40;
        index2=rand()%40;
        temp=feed->y1[index1];
        feed->y1[index1]=feed->y1[index2];
        feed->y1[index2]=temp;
    }
}

void feedArrayInitialize(struct feedArray *feed){
    for(int i=0;i<40;i++){
        feed->x1[i]=i*10;
        if(i==0 || i==1){
            feed->x1[i]=(rand()%8+12)*10;
        }
    }
    for(int j=0;j<40;j++){
        feed->y1[j]=j*10;
        if(j==0 || j==1){
            feed->y1[j]=(rand()%15+10)*10;
        }
    }
    arrayShuffle(feed);
}

int main(){
    HWND window;
    AllocConsole();
    window=FindWindowA("ConsoleWindowClass",NULL);
    ShowWindow(window,0);
    srand(time(NULL));
    struct snake snake1;
    struct feedArray feed1;
    int gd=DETECT;
    int gm;
    initgraph(&gm,&gd,"C:\\TC\\BGI");
    initwindow(450,450,"Snake");
    int page=0;
    POINT cursorPosition;
    int x1=50,y1=50,x2=60,y2=60;
    int fps=0,Difficulty=105;
    int foodx,foody,snakesFed=1;
    initialize(&snake1,5);
    feedArrayInitialize(&feed1);
    while(1){

        setactivepage(page);
        setvisualpage(1-page);
        cleardevice();
        draw(snake1);
        if(fps%Difficulty==0){
            fps=0;
            update(&snake1,10);
            updateDirection(&snake1);
        }
        feed(&foodx,&foody,&snakesFed,&feed1);
        fedorNot(&snake1,foodx,foody,&snakesFed);
        keyState(&snake1);
        if( GetAsyncKeyState(VK_SPACE) ){
            ShowWindow(window,1);
            exit(1);
        }
        crashControl(&snake1);
        crashSelf(&snake1);
        page=1-page;
        fps++;
    }
}
