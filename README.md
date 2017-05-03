# TSP
by Sergey Yakimov

package tsp;
 
 ```java
class Tsp {
 
    int[] tsp(int[][] graph) {
        int[] a = new int[graph.length];
        int[] p = new int[graph.length + 1];
 
        for (int i = 0; i < a.length; i++) a[i] = i;
        for (int i = 0; i < p.length; i++) p[i] = i;
 
        int[] bestPath = a.clone();
        int bestCost = 0;
        for (int i : bestPath) bestCost += i;
 
        int i = 1;
        while (i < graph.length) {
            p[i]--;
 
            int j = i % 2 * p[i];
            int tmp = a[j];
            a[j] = a[i];
            a[i] = tmp;
 
            i = 1;
            while (p[i] == 0) p[i] = i++;
 
            int cost = 0;
            for (int k : a) cost += k;
            if (cost < bestCost) {
                bestPath = a.clone();
                bestCost = cost;
            }
        }
 
        return bestPath;
    }
 }
```
