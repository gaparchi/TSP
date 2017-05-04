# TSP
by Sergey Yakimov

package tsp;
 
 ```java
package tsp;

class Tsp {

    int[] tsp(int[][] graph) {
        int[] path = new int[graph.length];
        int[] p = new int[graph.length + 1];
        for (int i = 0; i < path.length; i++) path[i] = p[i] = i;
        p[graph.length] = graph.length;

        int[] costs = new int[graph.length - 1];
        int cost = 0;
        for (int i = 0; i < costs.length; i++) cost += costs[i] = graph[path[i]][path[i + 1]];

        int[] bestPath = path.clone();
        int bestCost = cost;

        int i = 1;
        while (i < graph.length) {
            int j = i % 2 * --p[i];

            int tmp = path[j];
            path[j] = path[i];
            path[i] = tmp;

            int[] rowI = graph[path[i]];
            int[] rowJ = graph[path[j]];

            if (i > 0) cost -= costs[i - 1] - (costs[i - 1] = rowI[path[i - 1]]);
            if (j > 0) cost -= costs[j - 1] - (costs[j - 1] = rowJ[path[j - 1]]);
            if (i < costs.length - 1) cost -= costs[i] - (costs[i] = rowI[path[i + 1]]);
            if (j < costs.length - 1) cost -= costs[j] - (costs[j] = rowJ[path[j + 1]]);

            i = 1;
            while (p[i] == 0) p[i] = i++;

            if (cost < bestCost) {
                bestPath = path.clone();
                bestCost = cost;
            }
        }

        return bestPath;
    }

}
```
