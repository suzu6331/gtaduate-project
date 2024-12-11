#include <bits/stdc++.h>
using namespace std;
using ll = long long;

const int MAXN = 20;
const ll INF = 1e18;

struct Player {
    ll l, r;
};

int N;
int totalNodes;
vector<Player> players;
vector<vector<ll>> dp;

void dfs(int node, int level) {
    if (level == N) {  // Leaf node (player)
        dp[node][0] = abs(players[node - totalNodes].l - players[node - totalNodes].l) + abs(players[node - totalNodes].r - players[node - totalNodes].r);  // Matched
        dp[node][1] = 0;  // Unmatched
        return;
    }

    int leftChild = node * 2 + 1;
    int rightChild = node * 2 + 2;

    dfs(leftChild, level + 1);
    dfs(rightChild, level + 1);

    dp[node].assign(N + 2, INF);

    for (int k1 = 0; k1 <= N + 1; ++k1) {
        for (int k2 = 0; k2 <= N + 1; ++k2) {
            if (k1 + k2 > N + 1) continue;

            // Leave unmatched leaves as is
            dp[node][k1 + k2] = min(dp[node][k1 + k2], dp[leftChild][k1] + dp[rightChild][k2]);

            // Try to match one unmatched leaf from left with one from right
            if (k1 > 0 && k2 > 0) {
                ll cost = dp[leftChild][k1] + dp[rightChild][k2];

                // The cost to adjust their availability ranges so they can play on the same day
                cost += 0;  // Since we can choose any match day, we can adjust their ranges accordingly without extra cost

                dp[node][k1 + k2 - 2] = min(dp[node][k1 + k2 - 2], cost);
            }
        }
    }
}

int main() {
    cin >> N;
    int numPlayers = 1 << N;
    players.resize(numPlayers);
    for (int i = 0; i < numPlayers; ++i) {
        cin >> players[i].l >> players[i].r;
    }

    totalNodes = numPlayers * 2 - 1;
    dp.resize(totalNodes);

    dfs(0, 0);

    cout << dp[0][0] << endl;

    return 0;
}
