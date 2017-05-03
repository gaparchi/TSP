# TSP
by Sergey Yakimov

package tsp;
 
 ```java
package tsp;

class Tsp {

    int[] tsp(int[][] graph) {
        int[] path = new int[graph.length];
        int[] p = new int[graph.length + 1];

        for (int i = 0; i < path.length; i++) path[i] = i;
        for (int i = 0; i < p.length; i++) p[i] = i;

        int[] bestPath = path.clone();
        int bestCost = 0;
        for (int i = 1; i < bestPath.length; i++) bestCost += graph[bestPath[i - 1]][bestPath[i]];

        int i = 1;
        while (i < graph.length) {
            p[i]--;

            int j = i % 2 * p[i];
            int tmp = path[j];
            path[j] = path[i];
            path[i] = tmp;

            i = 1;
            while (p[i] == 0) p[i] = i++;

            int cost = 0;
            for (int k = 1; k < path.length; k++) cost += graph[path[k - 1]][path[k]];
            if (cost < bestCost) {
                bestPath = path.clone();
                bestCost = cost;
            }
        }

        return bestPath;
    }

}
```
