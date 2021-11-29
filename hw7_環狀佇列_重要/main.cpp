#include <iostream>
#define NUM 5
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
int ADDQ(int);
int DeleteQ(void);
void PrintQ(void);

typedef struct queue
{
	int Cqueue[NUM];
	int Rear;
	int Front; 
}Queue;
Queue q;
 
 
int main(int argc, char** argv) {
	int op=0,item,s=1,i;
	q.Rear=0;
	q.Front=0;
	cout<<"程式描述:環狀佇列進行Enqueue以及Dequeue"<<endl;
	while(s)
	{
		cout<<"======================="<<endl;
		cout<<"1.Enqueue/ADDQ(加入)"<<endl;
		cout<<"2.Dequeue/Delete(刪除)"<<endl;
		cout<<"3.顯示環狀佇列"<<endl;
		cout<<"4.結束"<<endl;
		cout<<"======================="<<endl;
		cout<<"請輸入操作:";
		cin>>op;
		
		switch(op)
		{
			case 1:
				int value;
				cout<<"請輸入數字:";
				cin>>value;
				ADDQ(value);
				/*q.Cqueue[q.Rear]=value;
				q.Rear=(q.Rear+1)%5; */
				 break; 
			case 2:
				cout<<"刪除數字"<<endl;
				DeleteQ();
				/*q.Cqueue[q.Front]=0;
				q.Front=(q.Front+1)%5;*/
				 break; 
			case 3:
				cout<<"顯示環狀佇列"<<endl; 
				PrintQ();
				/*for(i=0;i<5;i++){
					cout<<q.Cqueue[i]<<endl;
				}*/
				 break; 
			case 4:
				s=0;
				cout<<endl<<"結束操作"; 
				break; 
		}	
	} 
	return 0;
}
int ADDQ(int v)
{
	int value=v;
	q.Cqueue[q.Rear]=value;
				q.Rear=(q.Rear+1)%5; 
}
int DeleteQ(void){
	q.Cqueue[q.Front]=0;
				q.Front=(q.Front+1)%5;
}
void PrintQ(){
	int i;
	for(i=0;i<5;i++){
		cout<<q.Cqueue[i]<<endl;
	}
} 
