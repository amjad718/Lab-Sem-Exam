#include<stdio.h>
#include<stdbool.h>
#define MAX 100

int stack[MAX],arr[MAX],asc[MAX],dsc[MAX],top=-1,stack1[MAX],stack2[MAX];

void push(){
	if(top == MAX-1){
		printf("Stack Overflow!!");
	}
	else{
		int item;
		printf("Enter the item to insert");
		scanf("%d",&item);
		stack[++top] = item;
	}
}

void pop(){
	if(top==-1){
		printf("Stack Underflow!!\n");
	}
	else{
		printf("The deleted element is %d",stack[top]);
		top--;
	}
}

/*void palindrome(){
	bool reverse;
	int stack1[MAX],stack2[MAX],n,top1=-1,top2=-1;
	printf("Enter the size:");
	scanf("%d",&n);
	printf("Enter the elements in the Stack 1:");
	for(int i=0;i<n;i++){
		scanf("%d",&stack1[i]);
		top1 = stack1[i];
	}
	printf("Enter the elements in the Stack 2:");
	for(int i=0;i<n;i++){
		scanf("%d",&stack2[i]);
		top2 = stack2[i];
	}
	for(int i=0;i<=top1-1;i++){
		for(int j=top2-1;j>=0;j--){
			if(stack1[i]==stack2[j]){
				reverse = true;
			}
			else{
				reverse = false;
			}
		}
	}
	if(reverse==true){
		printf("\nThe number is palindrome");
	}
	else{
		printf("\nThe number is not palindrome");
	}
}*/

void palindrome(){
	int n;
	bool reverse;
	printf("Enter the size:");
	scanf("%d",&n);
	printf("Enter the elements in the Stack:");
	for(int i=0;i<n;i++){
		scanf("%d",&stack[i]);
		top = stack[i];
	}
	for(int i=0; i<=top-1; i++){
		for(int j=top-1; j>=0; j--){
			if(stack[i] == stack[j]){
				reverse = true;
			}
			else{
				reverse = false;
				break;
			}
		}
	}
	if(reverse==true){
		printf("The number is palindrome");
	}
	else{
		printf("The number is not palindrome");
	}
}

void display(){
	printf("Stack:\n");
	for(int i=top;i>=0;i--){
		printf("%d\n",stack[i]);
	}
}

void main(){
	int choice;
	do{
		printf("\nEnter the choice:\n1) Push\n2) Pop\n3) Palindrome\n4) Display\n0) Exit\n");
		scanf("%d",&choice);
		switch(choice){
			case 1: push();
					break;
			case 2: pop();
					break;
			case 3: palindrome();
					break;
			case 4: display();
					break;
			case 0: printf("Exiting...!!!");
					break;
			default: printf("Invalid Input!!");
					break;
		}
	}while(choice!=0);
}
