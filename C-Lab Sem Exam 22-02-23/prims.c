#include<stdio.h>

#define MAX 100

int adj[MAX][MAX],visited[MAX],parent[MAX],dist[MAX],num_vertices,num_edges;

int min_distance(){
	int min = 999;
	int min_index = -1;
	for(int i=0; i<num_vertices; i++){
		if(!visited[i] && dist[i] < min){
			min = dist[i];
			min_index = i;
		}
	}
	return min_index;
}

void prim(){
	for(int i=0;i<num_vertices;i++){
		visited[i] = 0;
		dist[i] = 999;
		parent[i] = -1;
	}
	dist[0] = 0;
	for(int i=0; i<(num_vertices-1); i++){
		int u = min_distance();
		visited[u] = 1;
		for(int v=0; v<num_vertices; v++){
			if(adj[u][v] && !visited[v] && adj[u][v] < dist[v]){
				parent[v] = u;
				dist[v] = adj[u][v];
			}
		}
	}	
}

void main(){
	int start,end,weight,total=0;
	printf("Enter the number of vertices:\n");
	scanf("%d",&num_vertices);
	printf("Enter the number of edges:");
	scanf("%d",&num_edges);
	for(int i=0;i<num_vertices;i++){
		for(int j=0;j<num_vertices;j++){
			adj[i][j] = 0;
		}
	}
	printf("Enter the edges");
	for(int i=0; i<num_edges; i++){
		printf("\nEnter edge %d (start end weight):",i+1);
		scanf("%d %d %d",&start,&end,&weight);
		adj[start][end] = weight;
		adj[end][start] = weight;
	}
	prim();
	printf("Minimum Spanning Tree:\n");
	for(int i=1; i<num_vertices; i++){
		printf("(%d,%d) -> %d\n",parent[i],i,dist[i]);
		total += dist[i];
	}
	printf("\nThe total cost of the tree is: %d:",total);
}
