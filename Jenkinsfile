pipeline {
    agent any

    environment {
        COMPOSE_FILE = 'docker-compose.yml'
    }

    triggers {
        githubPush()  // Triggers build when a push happens to GitHub
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
                    sh 'docker-compose down || true'
                }
            }
        }

        stage('Start Containers') {
            steps {
                script {
                    sh 'docker-compose up -d --build'
                }
            }
        }

        stage('Verify') {
            steps {
                script {
                    sh 'docker ps'  // Shows running containers
                }
            }
        }
    }

    post {
        failure {
            echo 'Build failed!'
        }
    }
}
