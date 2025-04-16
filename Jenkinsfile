pipeline {
    agent any

    environment {
        IMAGE_NAME = "php-demo-app"
        CONTAINER_NAME = "php-demo-container"
    }

    stages {
        stage('Clean Workspace') {
            steps {
                cleanWs() // Clean up old files in Jenkins workspace
            }
        }

        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Stop and Remove Old Containers and Volumes') {
            steps {
                script {
                    echo "Stopping and removing old containers and volumes..."
                    bat "docker-compose down -v || echo Nothing to stop"
                }
            }
        }

        stage('Build and Run Fresh Containers') {
            steps {
                script {
                    echo "Rebuilding and running containers..."
                    bat "docker-compose up -d --build"
                }
            }
        }

        stage('Verify Deployment') {
            steps {
                script {
                    echo "📝 Showing Docker status and logs:"
                    bat "docker-compose ps"
                    bat "docker-compose logs --tail=10"
                }
            }
        }
    }

    post {
        failure {
            echo '❌ Build or deployment failed!'
        }
        success {
            echo '✅ App deployed successfully with latest index.php.'
        }
    }
}
