pipeline {
    agent any

    environment {
        // Set Docker container name for easy reference
        CONTAINER_NAME = 'project-copy2'
    }

    stages {
        stage('Checkout SCM') {
            steps {
                checkout scm
            }
        }

        stage('Clone Repository') {
            steps {
                script {
                    // Clone the repository again, in case you want to do any specific operations
                    sh 'git clone https://github.com/Karthik123467/php-docker-stack-demo.git'
                }
            }
        }

        stage('Copy to Container') {
            steps {
                script {
                    // Archive the files, excluding .git and the tar.gz file to avoid race condition
                    sh 'tar --warning=no-file-changed --exclude=.git --exclude=project.tar.gz -czf project.tar.gz .'

                    // Copy to the Docker container project-copy2 (Ensure the container is running)
                    sh 'docker cp project.tar.gz ${CONTAINER_NAME}:/var/www/html/'
                }
            }
        }

        stage('Docker Compose Up') {
            steps {
                script {
                    // Run docker-compose up (bring up the containers defined in the docker-compose.yml)
                    sh 'docker-compose up -d'
                }
            }
        }

        stage('Run Tests or Wait') {
            steps {
                script {
                    // You can put your testing code or just wait for a while
                    echo 'Waiting for container to start or running tests...'
                    // Example: sleep 60 (wait for the container to initialize)
                    // sleep 60
                }
            }
        }

        stage('Docker Compose Down') {
            steps {
                script {
                    // Run docker-compose down to stop the containers
                    sh 'docker-compose down'
                }
            }
        }
    }

    post {
        always {
            // Cleanup steps that should run regardless of the pipeline status
            cleanWs()
        }
    }
}
