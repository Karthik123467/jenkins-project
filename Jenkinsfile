pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = "php-docker-stack-demo"
    }

    stages {
        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/jenkins-project'
            }
        }

        stage('Stop & Remove Old Containers') {
            steps {
                script {
                    echo "Stopping and removing old containers and volumes..."
                    bat "docker-compose down"
                }
            }
        }

        stage('Rebuild and Run Docker Compose') {
            steps {
                script {
                    echo "Rebuilding and running the app with latest code..."
                    bat "docker-compose up"
                }
            }
        }

        stage('Verify Deployment') {
            steps {
                script {
                    echo "Showing container status..."
                    bat "docker-compose ps"
                    echo "Tailing logs..."
                    bat "docker-compose logs --tail=10"
                }
            }
        }
    }

    post {
        success {
            echo '✅ App deployed with latest changes from GitHub.'
        }
        failure {
            echo '❌ Deployment failed. Check logs.'
        }
    }
}
