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
	cout<<"�{���y�z:������C�i��Enqueue�H��Dequeue"<<endl;
	while(s)
	{
		cout<<"======================="<<endl;
		cout<<"1.Enqueue/ADDQ(�[�J)"<<endl;
		cout<<"2.Dequeue/Delete(�R��)"<<endl;
		cout<<"3.���������C"<<endl;
		cout<<"4.����"<<endl;
		cout<<"======================="<<endl;
		cout<<"�п�J�ާ@:";
		cin>>op;
		
		switch(op)
		{
			case 1:
				int value;
				cout<<"�п�J�Ʀr:";
				cin>>value;
				ADDQ(value);
				/*q.Cqueue[q.Rear]=value;
				q.Rear=(q.Rear+1)%5; */
				 break; 
			case 2:
				cout<<"�R���Ʀr"<<endl;
				DeleteQ();
				/*q.Cqueue[q.Front]=0;
				q.Front=(q.Front+1)%5;*/
				 break; 
			case 3:
				cout<<"���������C"<<endl; 
				PrintQ();
				/*for(i=0;i<5;i++){
					cout<<q.Cqueue[i]<<endl;
				}*/
				 break; 
			case 4:
				s=0;
				cout<<endl<<"�����ާ@"; 
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
