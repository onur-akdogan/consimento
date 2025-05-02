<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Manager\SubscriptionManager;
 
use App\Http\Middleware\AuthCheck;
// If you have models for analytics data, import them here
// use App\Models\Analytics;
// use App\Models\Sale;
// use App\Models\Project;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
     }

    /**
     * Show the main dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();

        $companies = $user->companies; // ilişki üzerinden alırsan daha verimli
    
        if ($companies->isEmpty()) {
            return redirect()->route('companies.index')->with('warning', 'İlk olarak firma eklemelisiniz.');
        }
    

        // Get data for dashboard widgets
        $totalUsers = User::count();
        
        // Example data for dashboard
        $recentActivity = $this->getRecentActivity();
        $performanceData = $this->getPerformanceData();
        $salesData = $this->getSalesData();
        
        return view('welcome', compact(
            'totalUsers',
            'recentActivity',
            'performanceData',
            'salesData'
        ));
    }
 
    /**
     * Show the analytics dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function analytics(): View
    {
        // Get analytics specific data
        $analyticsData = $this->getAnalyticsData();
        $userStatistics = $this->getUserStatistics();
        $trafficSources = $this->getTrafficSources();
        
        return view('dashboard.analytics', compact(
            'analyticsData',
            'userStatistics',
            'trafficSources'
        ));
    }

    /**
     * Get recent activity data for the dashboard.
     *
     * @return array
     */
    private function getRecentActivity(): array
    {
        // In a real application, you would fetch this from your database
        return [
            [
                'user' => 'John Doe',
                'action' => 'Created a new project',
                'time' => now()->subHours(1),
                'icon' => 'folder-plus',
                'color' => 'success'
            ],
            [
                'user' => 'Jane Smith',
                'action' => 'Uploaded new files',
                'time' => now()->subHours(3),
                'icon' => 'upload',
                'color' => 'info'
            ],
            [
                'user' => 'Alex Johnson',
                'action' => 'Completed task: Website redesign',
                'time' => now()->subHours(5),
                'icon' => 'check-circle',
                'color' => 'primary'
            ],
            [
                'user' => 'Sarah Williams',
                'action' => 'Started a new task',
                'time' => now()->subHours(7),
                'icon' => 'play',
                'color' => 'warning'
            ],
        ];
    }

    /**
     * Get performance data for charts.
     *
     * @return array
     */
    private function getPerformanceData(): array
    {
        // This would normally come from a database or analytics service
        return [
            'monthly' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'datasets' => [
                    [
                        'label' => 'Target',
                        'data' => [65, 59, 80, 81, 56, 89, 40, 32, 65, 59, 80, 81]
                    ],
                    [
                        'label' => 'Actual',
                        'data' => [28, 48, 40, 19, 86, 27, 90, 35, 91, 58, 63, 75]
                    ]
                ]
            ],
            'completion_rate' => 75, // Percentage of tasks completed
            'project_status' => [
                'completed' => 12,
                'in_progress' => 8,
                'pending' => 4
            ]
        ];
    }

    /**
     * Get sales data for the dashboard.
     *
     * @return array
     */
    private function getSalesData(): array
    {
        // This would normally come from your sales database
        return [
            'total' => 158200,
            'growth' => 14.5, // Percentage growth
            'monthly' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                'data' => [12500, 15000, 17800, 16200, 14000, 18000]
            ],
            'top_products' => [
                ['name' => 'Product A', 'sales' => 352, 'growth' => 5.2],
                ['name' => 'Product B', 'sales' => 285, 'growth' => 3.8],
                ['name' => 'Product C', 'sales' => 196, 'growth' => -2.3],
                ['name' => 'Product D', 'sales' => 163, 'growth' => 9.7],
            ]
        ];
    }

    /**
     * Get analytics data.
     *
     * @return array
     */
    private function getAnalyticsData(): array
    {
        return [
            'users' => [
                'total' => 5840,
                'new' => 584,
                'returning' => 5256,
                'growth' => 12.5
            ],
            'sessions' => [
                'total' => 12450,
                'per_user' => 2.13,
                'bounce_rate' => 32.4,
                'duration' => '2m 45s'
            ],
            'pageviews' => [
                'total' => 47890,
                'per_session' => 3.85,
                'most_visited' => '/products/featured'
            ]
        ];
    }

    /**
     * Get user statistics data.
     *
     * @return array
     */
    private function getUserStatistics(): array
    {
        return [
            'devices' => [
                'mobile' => 62,
                'desktop' => 28,
                'tablet' => 10
            ],
            'browsers' => [
                'chrome' => 68,
                'safari' => 15,
                'firefox' => 10,
                'edge' => 5,
                'other' => 2
            ],
            'demographics' => [
                'age' => [
                    '18-24' => 15,
                    '25-34' => 32,
                    '35-44' => 26,
                    '45-54' => 18,
                    '55+' => 9
                ],
                'gender' => [
                    'male' => 54,
                    'female' => 46
                ]
            ]
        ];
    }

    /**
     * Get traffic sources data.
     *
     * @return array
     */
    private function getTrafficSources(): array
    {
        return [
            'sources' => [
                'direct' => 30,
                'organic' => 25,
                'referral' => 20,
                'social' => 15,
                'email' => 10
            ],
            'top_referrers' => [
                ['name' => 'facebook.com', 'visits' => 1840, 'conversion' => 3.2],
                ['name' => 'google.com', 'visits' => 1560, 'conversion' => 4.5],
                ['name' => 'twitter.com', 'visits' => 890, 'conversion' => 2.1],
                ['name' => 'instagram.com', 'visits' => 780, 'conversion' => 2.8],
            ]
        ];
    }
}